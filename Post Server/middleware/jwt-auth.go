package middleware

import (
	"net/http"
)

func Authorize(nextHandler http.Handler) http.Handler {
	return http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		isLoggedIn := CheckLoggedIn(r)
		if !isLoggedIn {
			http.Redirect(w, r, "/api/auth/login", http.StatusSeeOther)
			return
		}
		nextHandler.ServeHTTP(w, r)
	})
}

func CheckLoggedIn(r *http.Request) bool {
	cookie, err := r.Cookie("session")
	if err == nil {
		if cookie.Value == "Valid" {
			return true
		}
	}

	return false
}

// func
