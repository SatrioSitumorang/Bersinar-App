package entity

type User struct {
	ID           uint64 `gorm:"primary_key:auto_increament" json:"id"`
	Name         string `gorm:"type:varchar(255)" json:"name"`
	Email        string `gorm:"uniqueIndex;type:varchar(255)" json:"email"`
	Password     string `gorm:"->;<-;not null" json:"-"`
	AccessToken  string `gorm:"-" json:"accesstoken,omitempty"`
	RefreshToken string `gorm:"type:text" json:"refreshtoken,omitempty"`
}

type RegisterDTO struct {
	Name     string `json:"name" form:"name" binding:"required"`
	Email    string `json:"email" form:"email" binding:"required,email"`
	Password string `json:"password" form:"password" binding:"required"`
}
type LoginDTO struct {
	Email    string `json:"email" form:"email" binding:"required"`
	Password string `json:"password" form:"password" binding:"required"`
}
type UserUpdateDTO struct {
	ID       uint64 `json:"id" form:"id"`
	Name     string `json:"name" form:"name" binding:"required"`
	Email    string `json:"email" form:"email" binding:"required,email"`
	Password string `json:"password,omitempty" form:"password,omitempty" binding:"required"`
}
