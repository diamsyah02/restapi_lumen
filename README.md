# restapi_lumen
 Latihan membuat restful api dengan lumen & JWT
 
# referensi belajar
 https://blog.cacan.id/rest-api-dengan-json-web-token-lumen-7/
 
# demo
 http://lumen.diamsyah.com/
 
# additional
 - sedikit pengembangan nambah endpoint product
 - referensi belajar pakai lumen 7, di project saya ini saya pakai lumen 8.1
 
# doc restful api for testing
- Login
  - method
    - POST
  - headers
    - "Content-Type" : "application/x-www-form-urlencoded"
  - body
    - application/x-www-form-urlencoded
    - ["email", "diamsyahmd@gmail.com"], ["password", "rahasia123"]
  - endpoint
    - http://lumen.diamsyah.com/login
    
- Product
  - method
    - GET
  - headers
    - "Authorization" : "Bearer (token login)"
  - endpoint
    - http://lumen.diamsyah.com/product
    - http://lumen.diamsyah.com/product/{id}
