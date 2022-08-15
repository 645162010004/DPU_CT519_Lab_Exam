package main

import (
    "fmt"
    "net/http"
)
func index(w http.ResponseWriter, req *http.Request){
	p := "./www/index.html"
	http.ServeFile(w, req, p)

}

func CT519(w http.ResponseWriter, req *http.Request){
	p := "./www/CT519.html"
	http.ServeFile(w, req, p)

}
func myresearch(w http.ResponseWriter, req *http.Request){
	p := "./www/myresearch.html"
	http.ServeFile(w, req, p)

}

func headers(w http.ResponseWriter, req *http.Request) {

    for name, headers := range req.Header {
        for _, h := range headers {
            fmt.Fprintf(w, "%v: %v\n", name, h)
        }
    }
}

func main() {
    http.HandleFunc("/",index)
    http.HandleFunc("/CT519", CT519)
    http.HandleFunc("/headers", headers)
    http.HandleFunc("/myresearch",myresearch)
    http.ListenAndServe(":9904", nil)
}
