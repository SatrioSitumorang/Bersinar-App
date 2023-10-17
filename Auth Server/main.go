package main

import (
	"BSB/OAuth2/handler"
	"fmt"
	"log"
	"net/http"
)

func main() {
	server := &http.Server{
		Addr:    fmt.Sprintf(":9090"),
		Handler: handler.New(),
	}
	log.Printf("Starting AuthServer. Listening at %q", server.Addr)
	if err := server.ListenAndServe(); err != http.ErrServerClosed {
		log.Printf("%v", err)
	} else {
		log.Println("Server Closed!")
	}
}
