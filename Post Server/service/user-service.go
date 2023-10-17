package service

import (
	"BSB/BSB/entity"
	"BSB/BSB/repository"
	"log"

	"github.com/mashingan/smapping"
)

type UserService interface {
	Update(user entity.UserUpdateDTO) entity.User
	Profile(userID int) entity.User
}

type userService struct {
	userRepository repository.UserRepository
}

func NewUserService(userRepo repository.UserRepository) UserService {
	return &userService{
		userRepository: userRepo,
	}
}

type tokens struct {
	AccessToken  string `json:"access_token"`
	RefreshToken string `json:"refresh_token"`
}

func CheckToken(data interface{}) {
	// DataString, _ := json.Marshal(data)
	// var token tokens
	// err := json.Unmarshal(DataString, &token)
	// if err != nil {
	// 	log.Println(err)
	// }
	// Req, err := utils.Auth_Server_Req(token, "/handleCallBack")

}

func (service *userService) Update(user entity.UserUpdateDTO) entity.User {
	userToUpdate := entity.User{}
	err := smapping.FillStruct(&userToUpdate, smapping.MapFields(&user))
	if err != nil {
		log.Fatalf("Failed map %v:", err)
	}
	updateUser := service.userRepository.UpdateUser(userToUpdate)
	return updateUser
}

func (service *userService) Profile(userID int) entity.User {
	return service.userRepository.ProfileUser(userID)
}
