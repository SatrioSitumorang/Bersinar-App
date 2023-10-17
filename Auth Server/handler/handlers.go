package handler

import "net/http"

func New() http.Handler {
	JWT := http.NewServeMux()
	JWT.HandleFunc("/CreateToken", CreateToken)
	JWT.HandleFunc("/Callback", handleCallback)
	JWT.HandleFunc("/Authenticate", AuthenticateToken)
	return JWT
}
