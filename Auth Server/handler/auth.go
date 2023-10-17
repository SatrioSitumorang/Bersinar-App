package handler

import (
	"BSB/OAuth2/response"
	"encoding/json"
	"fmt"
	"log"
	"net/http"
	"os"
	"time"

	"github.com/golang-jwt/jwt"
	"github.com/joho/godotenv"
)

type userEntity struct {
	ID       int    `json:"user_id"`
	Name     string `json:"name" form:"name" binding:"required"`
	Email    string `json:"email" form:"email" binding:"required,email"`
	Password string `json:"password" form:"password" binding:"required"`
}

func handleHome(w http.ResponseWriter, r *http.Request) {
	w.Write([]byte("Hello, World!"))
}

func CreateToken(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	var datas userEntity
	err := json.NewDecoder(r.Body).Decode(&datas)
	if err != nil {
		res := response.BuildErrorResponse("Failed To Create Token", err.Error(), response.EmptyObj{})
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	Token, err := Generate(datas)
	if err != nil {
		res := response.BuildErrorResponse("Failed To Create Token", err.Error(), response.EmptyObj{})
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	res := response.BuildResponse(true, "", Token)
	response, _ := json.Marshal(res)
	w.Write(response)
}

func CreateAccessToken(user userEntity) (string, error) {
	err := godotenv.Load()
	if err != nil {
		panic("Error loading.env file")
	}
	JWT_Secret := os.Getenv("JWT_Secret")
	type CustomClaim1 struct {
		UserID int    `json:"user_id"`
		Name   string `json:"name"`
		jwt.StandardClaims
	}
	//Create Access Token
	ATClaim := &CustomClaim1{
		user.ID,
		user.Name,
		jwt.StandardClaims{
			ExpiresAt: time.Now().Add(time.Minute * 10).Unix(),
			IssuedAt:  time.Now().Unix(),
		},
	}
	AToken := jwt.NewWithClaims(jwt.SigningMethodHS256, ATClaim)
	AT, err := AToken.SignedString([]byte(JWT_Secret))
	if err != nil {
		return err.Error(), err
	}
	return AT, nil

}

func CreateRefreshToken(user userEntity) (string, error) {
	err := godotenv.Load()
	if err != nil {
		panic("Error loading.env file")
	}
	JWT_Secret := os.Getenv("JWT_Secret")
	type CustomClaim2 struct {
		Name  string `json:"name"`
		Email string `json:"email"`
		jwt.StandardClaims
	}
	RTClaim := &CustomClaim2{
		user.Name,
		user.Email,
		jwt.StandardClaims{
			ExpiresAt: time.Now().Add(time.Hour * 1).Unix(),
			IssuedAt:  time.Now().Unix(),
		},
	}
	RToken := jwt.NewWithClaims(jwt.SigningMethodHS256, RTClaim)
	RT, err := RToken.SignedString([]byte(JWT_Secret))
	if err != nil {
		return err.Error(), err
	}
	return RT, nil
}

func Generate(user userEntity) (map[string]string, error) {

	AT, err := CreateAccessToken(user)
	if err != nil {
		return nil, err
	}

	RT, err := CreateRefreshToken(user)
	if err != nil {
		return nil, err
	}

	return map[string]string{
		"access_token":  AT,
		"refresh_token": RT,
	}, nil
}

type tokens struct {
	AccessToken  string `json:"access_token"`
	RefreshToken string `json:"refresh_token"`
}

func handleCallback(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	var datas tokens
	err := json.NewDecoder(r.Body).Decode(&datas)
	if err != nil {
		res := response.BuildErrorResponse("Failed To Create Token", err.Error(), response.EmptyObj{})
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}

	var newToken tokens
	AT, err, _ := authenticateJWT(datas.AccessToken)
	if ve, _ := err.(*jwt.ValidationError); ve.Errors&jwt.ValidationErrorExpired != 0 {
		RT, err, _ := authenticateJWT(datas.RefreshToken)
		if err == nil && RT.Valid {
			ATClaim, ok := extractExpClaims(datas.AccessToken)
			if ok != true {
				res := response.BuildErrorResponse("Failed To Extract Token", "Failed To Claim Access Token Payload", response.EmptyObj{})
				response, _ := json.Marshal(res)
				w.Write(response)
				return
			}
			var user userEntity
			err = mapClaimsToStruct(ATClaim, &user)
			if err != nil {
				log.Fatal(err)
			}
			newAccessToken, err := CreateAccessToken(user)
			if err != nil {
				res := response.BuildErrorResponse("Failed To Create Token", err.Error(), response.EmptyObj{})
				response, _ := json.Marshal(res)
				w.Write(response)
				return
			}
			newToken.AccessToken = newAccessToken
			newToken.RefreshToken = datas.RefreshToken
		}
	} else if err != nil && AT.Valid {
		res := response.BuildErrorResponse("Token is Still Valid", err.Error(), response.EmptyObj{})
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}

	res := response.BuildResponse(true, "", newToken)
	response, _ := json.Marshal(res)
	w.Write(response)
}

func mapClaimsToStruct(claims jwt.MapClaims, v interface{}) error {
	jsonClaims, err := json.Marshal(claims)
	if err != nil {
		return err
	}
	if json.Unmarshal(jsonClaims, v) != nil {
		return nil
	}
	return nil
}

func extractExpClaims(tokenStr string) (jwt.MapClaims, bool) {
	token, _, err := new(jwt.Parser).ParseUnverified(tokenStr, jwt.MapClaims{})
	if err != nil {
		return nil, false
	}
	if claims, ok := token.Claims.(jwt.MapClaims); ok {
		return claims, true
	}

	// err := godotenv.Load()
	// if err != nil {
	// 	panic("Error loading.env file")
	// }
	// token, err := jwt.Parse(tokenStr, func(token *jwt.Token) (interface{}, error) {
	// 	if _, ok := token.Method.(*jwt.SigningMethodHMAC); !ok {
	// 		return nil, fmt.Errorf("unexpected signing method: %v", token.Header["alg"])
	// 	}
	// 	return []byte(os.Getenv("JWT_Secret")), nil
	// })
	// if claims, ok := token.Claims.(jwt.MapClaims); ok {
	// 	return claims, true
	// }
	return nil, false
}

func AuthenticateToken(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	var tokenstr tokens
	err := json.NewDecoder(r.Body).Decode(&tokenstr)
	if err != nil {
		res := response.BuildErrorResponse("Failed To Get Token or Token Not Found", err.Error(), response.EmptyObj{})
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	token, err, errstring := authenticateJWT(tokenstr.AccessToken)
	if err != nil {
		res := response.BuildErrorResponse("Failed To Get Token or Token Not Found", errstring, response.EmptyObj{})
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	fmt.Println("Sucess ", token)
}

func authenticateJWT(tokenString string) (*jwt.Token, error, string) {
	err := godotenv.Load()
	if err != nil {
		panic("Error loading.env file")
	}
	token, err := jwt.Parse(tokenString, func(token *jwt.Token) (interface{}, error) {
		if _, ok := token.Method.(*jwt.SigningMethodHMAC); !ok {
			return nil, fmt.Errorf("Unexpected Signing Method: %v", token.Header["alg"])

		}
		return []byte(os.Getenv("JWT_Secret")), nil
	})
	if err != nil {
		return nil, err, err.Error()
	}
	if token.Valid {
		return token, nil, ""
	} else if ve, ok := err.(*jwt.ValidationError); ok {
		if ve.Errors&jwt.ValidationErrorMalformed != 0 {
			return token, err, "Token Is Malformed"
		} else if ve.Errors&jwt.ValidationErrorExpired != 0 {
			return token, err, "Token Is Expired"
		} else if ve.Errors&jwt.ValidationErrorNotValidYet != 0 {
			return token, err, "Token Is Not Active Yet"
		} else {
			return token, err, "Token Is Invalid"
		}
	} else {
		return token, err, "Couldn't Handle This Token"
	}
}
