package repository

import (
	"BSB/BSB/entity"
	"BSB/BSB/utils"
	"crypto/sha256"
	"encoding/json"
	"fmt"

	"gorm.io/gorm"
)

type tokens struct {
	AccessToken  string `json:"access_token"`
	RefreshToken string `json:"refresh_token"`
}

type UserRepository interface {
	InsertUser(user entity.User) *entity.User
	UpdateUser(user entity.User) entity.User
	ProfileUser(userID int) entity.User
	GetUserByEmail(email string) *entity.User
}

type userConnection struct {
	connection *gorm.DB
}

func NewUserRepository(db *gorm.DB) UserRepository {
	return &userConnection{
		connection: db,
	}
}

func (db *userConnection) InsertUser(user entity.User) *entity.User {
	result := db.connection.Where("email = ?", user.Email).Take(&user)
	if result.Error == nil {
		return nil
	}
	// user.Token = GenerateToken(user)
	token, err := CreateToken(user)
	if err != nil {
		return nil
	}
	user.AccessToken = token.AccessToken
	user.RefreshToken = token.RefreshToken
	user.Password = HashPassword([]byte(user.Password))

	db.connection.Save(&user)

	return &user
}

func (db *userConnection) UpdateUser(user entity.User) entity.User {
	if user.Password != "" {
		user.Password = HashPassword([]byte(user.Password))
	} else {
		var tempUser entity.User
		db.connection.Find(&tempUser, user.ID)
		user.Password = tempUser.Password
	}
	db.connection.Save(&user)
	return user
}
func (db *userConnection) ProfileUser(userID int) entity.User {
	var user entity.User
	db.connection.Where("id =?", userID).Take(&user)
	return user
}

func (db *userConnection) GetUserByEmail(email string) *entity.User {
	var user *entity.User
	db.connection.Where("email = ?", email).Take(&user)
	return user
}

func HashPassword(passwd []byte) string {
	hash := sha256.Sum256(passwd)
	str := fmt.Sprintf("%x", hash)
	return str
}

func GenerateToken(user entity.User) string { //Still Need Salt Or Not (Preferable)
	strcombine := fmt.Sprintf("%s%s%s", user.Email, user.Name, user.Password)
	str := fmt.Sprintf("%x", sha256.Sum256([]byte(strcombine)))
	return str
}

func CreateToken(user entity.User) (tokens, error) {
	Req, err := utils.Auth_Server_Req(user, "/CreateToken")
	if err != nil || Req.Status == false {
		return tokens{}, err
	}
	var token tokens
	jsonString, _ := json.Marshal(Req.Data)
	err = json.Unmarshal(jsonString, &token)
	return token, nil
}
