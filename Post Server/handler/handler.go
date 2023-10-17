package handler

import (
	"BSB/BSB/entity"
	"BSB/BSB/response"
	"BSB/BSB/service"
	"encoding/json"
	"net/http"
)

type AuthHandler interface {
	Login(w http.ResponseWriter, r *http.Request)
	Register(w http.ResponseWriter, r *http.Request)
}

type authHandler struct {
	authService service.AuthService
}

func NewAuthHandler(authService service.AuthService) AuthHandler {
	return &authHandler{
		authService: authService,
	}
}

func (c *authHandler) Login(w http.ResponseWriter, r *http.Request) {
	var loginDTO entity.LoginDTO
	err := json.NewDecoder(r.Body).Decode(&loginDTO)
	w.Header().Set("Content-Type", "application/json")
	if err != nil {
		res := response.BuildErrorResponse("Failed to Process Request", err.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	authResult := c.authService.VerifyCredential(loginDTO.Email, loginDTO.Password)
	if authResult != nil {
		res := response.BuildResponse(true, "OK!", authResult)
		w.WriteHeader(http.StatusOK)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	res := response.BuildErrorResponse("Email Or Password Incorrect", "Email Or Password Incorrect", response.EmptyObj{})
	w.WriteHeader(http.StatusBadRequest)
	response, _ := json.Marshal(res)
	w.Write(response)
}

func (c *authHandler) Register(w http.ResponseWriter, r *http.Request) {
	var RegistUser entity.RegisterDTO
	err := json.NewDecoder(r.Body).Decode(&RegistUser)
	w.Header().Set("Content-Type", "application/json")
	if err != nil {
		res := response.BuildErrorResponse("Failed to Process Request", err.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	} else {
		createdUser := c.authService.CreateUser(RegistUser)
		if createdUser != nil {
			res := response.BuildResponse(true, "OK!", createdUser)
			w.WriteHeader(http.StatusCreated)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}
		res := response.BuildErrorResponse("Email Is Duplicated", "Email Is Duplicated", response.EmptyObj{})
		w.WriteHeader(http.StatusConflict)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}

}

type UserHandler interface {
	Update(w http.ResponseWriter, r *http.Request)
	Profile(w http.ResponseWriter, r *http.Request)
}

type userHandler struct {
	userService service.UserService
}

func NewUserHandler(userService service.UserService) UserHandler {
	return &userHandler{
		userService: userService,
	}
}

func (c *userHandler) Update(w http.ResponseWriter, r *http.Request) {
}

func (c *userHandler) Profile(w http.ResponseWriter, r *http.Request) {
	w.Write([]byte("Hello World , Welcome To Profile Page"))
}
