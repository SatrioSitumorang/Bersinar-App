package main

import (
	"BSB/BSB/accountcategory"
	"BSB/BSB/bisnisunittype"
	"BSB/BSB/bloodtype"
	"BSB/BSB/config"
	"BSB/BSB/corporate"
	"BSB/BSB/handler"
	"BSB/BSB/identitytype"
	"BSB/BSB/item"
	"BSB/BSB/itemcategory"
	"BSB/BSB/itemtype"
	"BSB/BSB/itemuom"
	"BSB/BSB/middleware"
	"BSB/BSB/occupation"
	"BSB/BSB/partnertype"
	"BSB/BSB/paymenttype"
	"BSB/BSB/position"
	"BSB/BSB/repository"
	"BSB/BSB/service"
	"BSB/BSB/statustype"
	"BSB/BSB/uomtype"
	"fmt"
	"net/http"

	"gorm.io/gorm"
)

var (
	db          *gorm.DB                  = config.SetupDBConnection()
	userRepo    repository.UserRepository = repository.NewUserRepository(db)
	userService service.UserService       = service.NewUserService(userRepo)
	authService service.AuthService       = service.NewAuthService(userRepo)
	authHandler handler.AuthHandler       = handler.NewAuthHandler(authService)
	userHandler handler.UserHandler       = handler.NewUserHandler(userService)
)

func main() {
	defer config.CloseDBConnection(db)
	http.HandleFunc("/api/auth/login", authHandler.Login)
	http.HandleFunc("/api/auth/register", authHandler.Register)
	http.Handle("/api/user/profile", middleware.Authorize(http.HandlerFunc(userHandler.Profile)))

	//Blood Type
	http.HandleFunc("/API/bloodType/viewAll", bloodtype.ViewAll)
	http.HandleFunc("/API/bloodType/viewById", bloodtype.ViewById)
	http.HandleFunc("/API/bloodType/insert", bloodtype.Insert)
	http.HandleFunc("/API/bloodType/update", bloodtype.Update)
	http.HandleFunc("/API/bloodType/deleteById", bloodtype.Delete)

	//Payment Type
	http.HandleFunc("/API/paymentType/viewAll", paymenttype.ViewAll)
	http.HandleFunc("/API/paymentType/viewById", paymenttype.ViewById)
	http.HandleFunc("/API/paymentType/insert", paymenttype.Insert)
	http.HandleFunc("/API/paymentType/update", paymenttype.Update)
	http.HandleFunc("/API/paymentType/deleteById", paymenttype.Delete)

	//Account Category
	http.HandleFunc("/API/accountCategory/viewAll", accountcategory.ViewAll)
	http.HandleFunc("/API/accountCategory/viewById", accountcategory.ViewById)
	http.HandleFunc("/API/accountCategory/insert", accountcategory.Insert)
	http.HandleFunc("/API/accountCategory/update", accountcategory.Update)
	http.HandleFunc("/API/accountCategory/deleteById", accountcategory.Delete)

	//Bisnis Unit Type
	http.HandleFunc("/API/bisnisUnitType/viewAll", bisnisunittype.ViewAll)
	http.HandleFunc("/API/bisnisUnitType/viewById", bisnisunittype.ViewById)
	http.HandleFunc("/API/bisnisUnitType/insert", bisnisunittype.Insert)
	http.HandleFunc("/API/bisnisUnitType/update", bisnisunittype.Update)
	http.HandleFunc("/API/bisnisUnitType/deleteById", bisnisunittype.Delete)

	//Position
	http.HandleFunc("/API/position/viewAll", position.ViewAll)
	http.HandleFunc("/API/position/viewById", position.ViewById)
	http.HandleFunc("/API/position/insert", position.Insert)
	http.HandleFunc("/API/position/update", position.Update)
	http.HandleFunc("/API/position/deleteById", position.Delete)

	//StatusType
	http.HandleFunc("/API/statusType/viewAll", statustype.ViewAll)
	http.HandleFunc("/API/statusType/viewById", statustype.ViewById)
	http.HandleFunc("/API/statusType/insert", statustype.Insert)
	http.HandleFunc("/API/statusType/update", statustype.Update)
	http.HandleFunc("/API/statusType/deleteById", statustype.Delete)

	//identityType
	http.HandleFunc("/API/identityType/viewAll", identitytype.ViewAll)
	http.HandleFunc("/API/identityType/viewById", identitytype.ViewById)
	http.HandleFunc("/API/identityType/insert", identitytype.Insert)
	http.HandleFunc("/API/identityType/update", identitytype.Update)
	http.HandleFunc("/API/identityType/deleteById", identitytype.Delete)

	//Occupation
	http.HandleFunc("/API/occupation/viewAll", occupation.ViewAll)
	http.HandleFunc("/API/occupation/viewById", occupation.ViewById)
	http.HandleFunc("/API/occupation/insert", occupation.Insert)
	http.HandleFunc("/API/occupation/update", occupation.Update)
	http.HandleFunc("/API/occupation/deleteById", occupation.Delete)

	//Partner Type
	http.HandleFunc("/API/partnerType/viewAll", partnertype.ViewAll)
	http.HandleFunc("/API/partnerType/viewById", partnertype.ViewById)
	http.HandleFunc("/API/partnerType/insert", partnertype.Insert)
	http.HandleFunc("/API/partnerType/update", partnertype.Update)
	http.HandleFunc("/API/partnerType/deleteById", partnertype.Delete)

	//Item Type
	http.HandleFunc("/API/itemType/viewAll", itemtype.ViewAll)
	http.HandleFunc("/API/itemType/viewById", itemtype.ViewById)
	http.HandleFunc("/API/itemType/insert", itemtype.Insert)
	http.HandleFunc("/API/itemType/update", itemtype.Update)
	http.HandleFunc("/API/itemType/deleteById", itemtype.Delete)

	//Item Category
	http.HandleFunc("/API/itemCategory/viewAll", itemcategory.ViewAll)
	http.HandleFunc("/API/itemCategory/viewById", itemcategory.ViewById)
	http.HandleFunc("/API/itemCategory/insert", itemcategory.Insert)
	http.HandleFunc("/API/itemCategory/update", itemcategory.Update)
	http.HandleFunc("/API/itemCategory/deleteById", itemcategory.Delete)

	//UOM Type
	http.HandleFunc("/API/uomType/viewAll", uomtype.ViewAll)
	http.HandleFunc("/API/uomType/viewById", uomtype.ViewById)
	http.HandleFunc("/API/uomType/insert", uomtype.Insert)
	http.HandleFunc("/API/uomType/update", uomtype.Update)
	http.HandleFunc("/API/uomType/deleteById", uomtype.Delete)

	//Item UoM
	http.HandleFunc("/API/itemUoM/viewAll", itemuom.ViewAll)
	http.HandleFunc("/API/itemUoM/viewById", itemuom.ViewById)
	http.HandleFunc("/API/itemUoM/insert", itemuom.Insert)
	http.HandleFunc("/API/itemUoM/update", itemuom.Update)
	http.HandleFunc("/API/itemUoM/deleteById", itemuom.Delete)

	//Item
	http.HandleFunc("/API/item/viewAll", item.ViewAll)
	http.HandleFunc("/API/item/viewById", item.ViewById)
	http.HandleFunc("/API/item/insert", item.Insert)
	http.HandleFunc("/API/item/update", item.Update)
	http.HandleFunc("/API/item/deleteById", item.Delete)

	// //Business Unit
	// http.HandleFunc("/API/businessUnit/viewAll", businessunit.ViewAll)
	// http.HandleFunc("/API/businessUnit/viewById", businessunit.ViewById)
	// http.HandleFunc("/API/businessUnit/insert", businessunit.Insert)
	// http.HandleFunc("/API/businessUnit/update", businessunit.Update)
	// http.HandleFunc("/API/businessUnit/deleteById", businessunit.Delete)

	//Corporate
	http.HandleFunc("/API/corporate/viewAll", corporate.ViewAll)
	http.HandleFunc("/API/corporate/viewById", corporate.ViewAll)
	http.HandleFunc("/API/corporate/insert", corporate.Insert)
	http.HandleFunc("/API/corporate/update", corporate.Update)
	http.HandleFunc("/API/corporate/deleteById", corporate.Delete)

	err := http.ListenAndServe(":8080", nil)
	fmt.Println("Running Server on port :8080")
	if err != nil {
		fmt.Println(err)
	}

}
