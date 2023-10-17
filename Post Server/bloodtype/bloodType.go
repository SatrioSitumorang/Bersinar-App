package bloodtype

import (
	"BSB/BSB/config"
	"BSB/BSB/response"
	"encoding/json"
	"net/http"
	"strconv"
)

type bloodTypeStruct struct {
	BloodTypeId   int    `gorm:"column:bloodTypeId;primary_key:auto_increament" json:"bloodTypeId"`
	BloodTypeName string `gorm:"column:bloodTypeName" json:"bloodTypeName"`
	Description   string `gorm:"column:description" json:"description"`
}

func ViewAll(w http.ResponseWriter, r *http.Request) {
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	w.Header().Set("Content-Type", "application/json")
	if r.Method == http.MethodGet {
		var bloodType []bloodTypeStruct
		// DB.Table("bloodType").Scan(&result)
		result := DB.Raw("CALL viewAll_bloodType").Take(&bloodType)
		if result.Error != nil {
			res := response.BuildErrorResponse("Cannot Get Data", result.Error.Error(), response.EmptyObj{})
			w.WriteHeader(http.StatusBadRequest)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}
		res := response.BuildResponse(true, "OK!", bloodType)
		w.WriteHeader(http.StatusOK)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	} else {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}

}

func ViewById(w http.ResponseWriter, r *http.Request) {
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	w.Header().Set("Content-Type", "application/json")
	if r.Method == http.MethodGet {
		id := r.URL.Query().Get("id")
		var bloodType, temp []bloodTypeStruct

		check := DB.Table("bloodType").Where("bloodTypeId = ?", id).Take(&temp)
		if check.Error != nil {
			res := response.BuildErrorResponse("No Data's Found", "No ID Found", response.EmptyObj{})
			w.WriteHeader(http.StatusBadRequest)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}

		result := DB.Raw("CALL view_bloodType_byId(?)", id).Scan(&bloodType)
		if result.Error != nil {
			res := response.BuildErrorResponse("Cannot Get Data", result.Error.Error(), response.EmptyObj{})
			w.WriteHeader(http.StatusBadRequest)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}
		tempint, _ := strconv.Atoi(id)
		bloodType[0].BloodTypeId = tempint
		res := response.BuildResponse(true, "OK!", bloodType)
		w.WriteHeader(http.StatusOK)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	} else {
		res := response.BuildErrorResponse("Wrong Method", "Wrong Method", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
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
	var newBloodType bloodTypeStruct
	err := json.NewDecoder(r.Body).Decode(&newBloodType)
	if err != nil {
		res := response.BuildErrorResponse("Failed to Process Request", err.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	} else {
		DB := config.SetupDBConnection()
		defer config.CloseDBConnection(DB)
		type tempBloodType struct {
			BloodTypeName string `gorm:"column:bloodTypeName" json:"bloodTypeName"`
			Description   string `gorm:"column:description" json:"description"`
			IsDeleted     int    `gorm:"column:isDeleted" json:"isDeleted"`
		}
		// var temp tempBloodType
		// check := DB.Table("bloodType").Where("bloodTypeName = ?", newBloodType.BloodTypeName).Take(&temp)
		// if check.Error == nil && temp.IsDeleted != 1 {
		// 	res := response.BuildErrorResponse("Cannot Insert Data", "Duplicated Data", response.EmptyObj{})
		// 	w.WriteHeader(http.StatusBadRequest)
		// 	response, _ := json.Marshal(res)
		// 	w.Write(response)
		// 	return
		// }
		marshalled, _ := json.Marshal(newBloodType)
		result := DB.Exec("CALL insert_bloodType(?)", string(marshalled))
		if result.Error != nil {
			res := response.BuildErrorResponse("Cannot Insert Data", result.Error.Error(), response.EmptyObj{})
			w.WriteHeader(http.StatusBadRequest)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}
		res := response.BuildResponse(true, "OK!", newBloodType)
		w.WriteHeader(http.StatusOK)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}

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
	var updatedBloodType, temp1 bloodTypeStruct
	err := json.NewDecoder(r.Body).Decode(&updatedBloodType)
	if err != nil {
		res := response.BuildErrorResponse("Failed to Process Request", err.Error(), response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	} else {
		DB := config.SetupDBConnection()
		defer config.CloseDBConnection(DB)
		Check := DB.Table("bloodType").Where("bloodTypeId = ?", updatedBloodType.BloodTypeId).Take(&temp1)
		if Check.Error != nil {
			res := response.BuildErrorResponse("Failed to Process Request", "No Data's Found In Database", response.EmptyObj{})
			w.WriteHeader(http.StatusBadRequest)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}
		marshalled, _ := json.Marshal(updatedBloodType)
		result := DB.Exec("Call update_bloodType(?)", string(marshalled))
		if result.Error != nil {
			res := response.BuildErrorResponse("Cannot Update Data", result.Error.Error(), response.EmptyObj{})
			w.WriteHeader(http.StatusBadRequest)
			response, _ := json.Marshal(res)
			w.Write(response)
			return
		}
		res := response.BuildResponse(true, "OK!", updatedBloodType)
		w.WriteHeader(http.StatusOK)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
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
	id := r.URL.Query().Get("id")
	DB := config.SetupDBConnection()
	defer config.CloseDBConnection(DB)
	type tempBloodType struct {
		BloodTypeId   int    `gorm:"column:bloodTypeId;primary_key:auto_increament" json:"bloodTypeId"`
		BloodTypeName string `gorm:"column:bloodTypeName" json:"bloodTypeName"`
		IsDeleted     int    `gorm:"column:isDeleted;default:0" json:"isDeleted"`
		Description   string `gorm:"column:description" json:"description"`
	}
	var temp tempBloodType
	check := DB.Table("bloodType").Where("bloodTypeId = ?", id).Take(&temp)
	if check.Error != nil {
		res := response.BuildErrorResponse("No Data's Found", "No ID Found", response.EmptyObj{})
		w.WriteHeader(http.StatusBadRequest)
		response, _ := json.Marshal(res)
		w.Write(response)
		return
	}
	result := DB.Exec("CALL delete_bloodType(?)", id)
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
