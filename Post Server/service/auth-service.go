package service

import (
	"BSB/BSB/entity"
	"BSB/BSB/repository"
	"crypto/sha256"
	"fmt"
	"log"

	"github.com/mashingan/smapping"
)

type AuthService interface {
	VerifyCredential(email string, password string) *entity.User
	CreateUser(user entity.RegisterDTO) *entity.User
}

type authService struct {
	userRepository repository.UserRepository
}

func NewAuthService(userRep repository.UserRepository) AuthService {
	return &authService{
		userRepository: userRep,
	}
}

func (service *authService) VerifyCredential(email string, password string) *entity.User {
	var user *entity.User
	if user = service.userRepository.GetUserByEmail(email); user != nil {
		compare := comparepassword(user.Password, password)
		if user.Email == email && compare {
			CheckToken(user)
			return user
		}
		return nil
	}

	return user
}

func (service *authService) CreateUser(user entity.RegisterDTO) *entity.User {
	userToCreate := entity.User{}
	err := smapping.FillStruct(&userToCreate, smapping.MapFields(&user))
	if err != nil {
		log.Fatalf("Failed to Map %v", err)
	}
	res := service.userRepository.InsertUser(userToCreate)
	return res
}

func comparepassword(hashpassword string, password string) bool {
	hash := sha256.Sum256([]byte(password))
	hashedPassword := fmt.Sprintf("%x", hash)
	if hashpassword == hashedPassword {
		return true
	} else {
		return false
	}
}
