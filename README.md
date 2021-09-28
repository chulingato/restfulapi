#Restful api practice using Laravel (not a CRUD)

==resetea etado antes de inicializar los test con 200 

==optiene el balance de una cuenta no existente
```
GET /balance?account_id=1234
404 0
```


==crear una cuenta con un balance inicial
```
POST /event {"type":"deposito","destino":"100","monto":10 }
201 {"destino":{"id":100,"balance":"20"}}
```


==obtener balance de una cuenta existente
```
GET /balance?account_id=100
200 20
```

==retirar de una cuenta no existente
```
POST /event {"tipo":"retiro", "origen":200, "monto":10}
404 0

```

==retirar de una cuenta  existente
```
POST /event {"tipo":"retiro", "origen":100, "monto":5}
201 {"origen":{"id":100, "balance":15}}

```

==transferir de una cuenta existente
```
POST /event {"tipo":"transferencia", "origen":100, "monto":15, "destino":300}
201 {"origen":{"id":100,"balance":"0"},"destino":{"id":300,"balance":"15"}}

```

==transferir de una cuenta no existente
```
POST /event {"tipo":"transferencia", "origen":200, "monto":15, "destino":300}
404 0


```