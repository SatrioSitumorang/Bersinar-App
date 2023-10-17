package paymenttype

import (
	"BSB/BSB/config"
	"BSB/BSB/response"
	"encoding/json"
	"net/http"
)

type paymentTypeStruct struct {
	IdPaymentType   int    `gorm:"column:idPaymentType;primary_key:auto_increament" json:"idPaymentType"`
	PaymentTypeCode string `gorm:"column:paymentTypeCode" json:"paymentTypeCode"`
	PaymentTypeName string `gorm:"column:paymentTypeName" json:"paymentTypeName"`
	IsAging         int    `gorm:"column:isAging" json:"isAging"`
	Description     string `gorm:"column:description" json:"description"`
}

type tempPaymentTypeStruct struct {
	PaymentTypeCode string `gorm:"column:paymentTypeCode" json:"paymentTypeCode"`
	PaymentTypeName string `gorm:"column:paymentTypeName" json:"paymentTypeName"`
	IsAging         int    `gorm:"column:isAging" json:"isAging"`
	Description     string `gorm:"column:description" json:"description"`
}

func ViewAll(w http.ResponseWriter, r *http.Request) {
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	w.Header().Set("Content-Type", "application/json; charset=UTF-8")
	if r.Method != http.MethodGet {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	// var paymentType []paymentTypeStruct
	var paymentType []paymentTypeStruct
	result := DB.Raw("CALL viewAll_paymentType").Scan(&paymentType)
	if result.Error != nil {
		res := response.BuildErrorResponse("Cannot Get Data", result.Error.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	res := response.BuildResponse(true, "OK!", paymentType)
	w.WriteHeader(http.StatusOK)
	response, _ := json.Marshal(res)
	w.Write(response)
	return
}

func ViewById(w http.ResponseWriter, r *http.Request) {
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	w.Header().Set("Content-Type", "application/json; charset=UTF-8")
	if r.Method != http.MethodGet {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	idPaymentType := r.URL.Query().Get("id")
	var paymentType, temp paymentTypeStruct
	check := DB.Table("paymentType").Where("idPaymentType = ?", idPaymentType).Take(&temp)
	if check.Error != nil {
		res := response.BuildErrorResponse("No Data's Found", "No ID Found", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	result := DB.Raw("CALL view_paymentType_byId(?)", idPaymentType).Scan(&paymentType)
	if result.Error != nil {
		res := response.BuildErrorResponse("Cannot Get Data", result.Error.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	res := response.BuildResponse(true, "OK!", paymentType)
	w.WriteHeader(http.StatusOK)
	response, _ := json.Marshal(res)
	w.Write(response)
	return
}

func Insert(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	if r.Method != http.MethodPost {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	var newPaymentType tempPaymentTypeStruct
	err := json.NewDecoder(r.Body).Decode(&newPaymentType)
	if err != nil {
		res := response.BuildErrorResponse("Failed to Process Request", err.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	// var temp paymentTypeStruct
	// check := DB.Table("paymentType").Where("idPaymentType = ?", newPaymentType.IdPaymentType).Take(&temp)
	// if check.Error == nil {
	// 	res := response.BuildErrorResponse("Cannot Insert Data", "Duplicated Data", response.EmptyObj{})
	// 	w.WriteHeader(http.StatusBadRequest)
	// 	response, _ := json.Marshal(res)
	// 	w.Write(response)
	// 	return
	// }
	marshalled, _ := json.Marshal(newPaymentType)
	result := DB.Exec("CALL insert_paymentType(?)", string(marshalled))
	if result.Error != nil {
		res := response.BuildErrorResponse("Cannot Insert Data", result.Error.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	res := response.BuildResponse(true, "OK!", newPaymentType)
	w.WriteHeader(http.StatusOK)
	response, _ := json.Marshal(res)
	w.Write(response)
	return
}

func Update(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	if r.Method != http.MethodPut {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	var UpdatePaymentType, temp paymentTypeStruct
	err := json.NewDecoder(r.Body).Decode(&UpdatePaymentType)
	w.Header().Set("Content-Type", "application/json")
	if err != nil {
		res := response.BuildErrorResponse("Failed to Process Request", err.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	Check := DB.Table("paymentType").Where("idPaymentType = ?", UpdatePaymentType.IdPaymentType).Take(&temp)
	if Check.Error != nil {
		res := response.BuildErrorResponse("Failed to Process Request", "No Data's Found In Database", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	marshalled, _ := json.Marshal(UpdatePaymentType)
	result := DB.Exec("CALL update_paymentType(?)", string(marshalled))
	if result.Error != nil {
		res := response.BuildErrorResponse("Cannot Update Data", result.Error.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	res := response.BuildResponse(true, "OK!", UpdatePaymentType)
	w.WriteHeader(http.StatusOK)
	response, _ := json.Marshal(res)
	w.Write(response)
	return
}

func Delete(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	if r.Method != http.MethodDelete {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	type tempPayment struct {
		PaymentTypeCode string `gorm:"column:paymentTypeCode" json:"paymentTypeCode"`
		PaymentTypeName string `gorm:"column:paymentTypeName" json:"paymentTypeName"`
		IsAging         int    `gorm:"column:isAging" json:"isAging"`
		Description     string `gorm:"column:description" json:"description"`
		IsDeleted       int    `gorm:"column:isDeleted" json:"isDeleted"`
	}
	id := r.URL.Query().Get("id")
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	var temp tempPayment
	check := DB.Table("paymentType").Where("idPaymentType = ?", id).Take(&temp)
	if check.Error != nil {
		res := response.BuildErrorResponse("No Data's Found", "No ID Found", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	result := DB.Exec("CALL delete_paymentType(?)", id)
	if result.Error != nil {
		res := response.BuildErrorResponse("Cannot Insert Data", result.Error.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	temp.IsDeleted = 1
	res := response.BuildResponse(true, "OK!", temp)
	w.WriteHeader(http.StatusOK)
	response, _ := json.Marshal(res)
	w.Write(response)
	return
}
