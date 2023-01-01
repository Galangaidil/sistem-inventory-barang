## About Sistem Inventory Barang

This repository contains API to manage inventory products at Toko Via Wijaya.

## API Specification

This section contains API specification of this repository. 
Including auth, managing products, and so on so forth.

### Auth

#### Login

- method: `POST`
- endpoint: `/api/v1/login`
- header:
  - Accept: `application/json`
- body:
```json
{
    "email": "string",
    "password": "string"
}
```
- response:
  - success:
```json
{
    "message": "string",
    "token": "string"
}
```  

  - error:
```json
{
    "message": "string"
}
```

#### Logout

- method: `POST`
- endpoint: `/api/v1/logout`
- header:
  - Accept: `application/json`
  - Authorization: Bearer `token`
- response:
  - success:
```json
{
    "message": "string"
}
```

### products

#### create product

- method: `POST`
- endpoint: `/api/v1/products`
- header:
    - Accept: `application/json`
    - Authorization: Bearer `token`
- body:
```json
{
    "code": "char(10), unique",
    "name": "string",
    "quantity": "int",
    "quantifier": "string"
}
```
- response:
    - success:
```json
{
    "message": "string",
    "product": {
        "id": "long",
        "code": "char",
        "name": "string",
        "quantifier": "string",
        "quantity": "int",
        "created_at": "timestamps",
        "updated_at": "timestamps"
    }
}
```  

- error:
```json
{
    "message": "string"
}
```

#### Get products

- method: `GET`
- endpoint: `/api/v1/products`
- header:
    - Accept: `application/json`
    - Authorization: Bearer `token`
- response:
    - success:
```json
[
    {
        "id": "long",
        "code": "char",
        "name": "string",
        "quantifier": "string",
        "quantity": "int",
        "created_at": "timestamps",
        "updated_at": "timestamps"
    },
    {
        "id": "long",
        "code": "char",
        "name": "string",
        "quantifier": "string",
        "quantity": "int",
        "created_at": "timestamps",
        "updated_at": "timestamps"
    }
]
```  

- error:
```json
{
    "message": "string"
}
```

#### Update product

- method: `PUT`
- endpoint: `/api/v1/products/{id}`
- header:
    - Accept: `application/json`
    - Authorization: Bearer `token`
- body:
```json
{
    "code": "char(10), unique",
    "name": "string",
    "quantity": "int",
    "quantifier": "string"
}
```
- response:
    - success:
```json
{
    "message": "string",
    "product": {
        "id": "long",
        "code": "char",
        "name": "string",
        "quantifier": "string",
        "quantity": "int",
        "created_at": "timestamps",
        "updated_at": "timestamps"
    }
}
```  

- error:
```json
{
    "message": "string"
}
```

#### Delete product

- method: `DELETE`
- endpoint: `/api/v1/products/{id}`
- header:
    - Accept: `application/json`
    - Authorization: Bearer `token`
- body:
- response:
    - success:
```json
{
    "message": "string"
}
```  

- error:
```json
{
    "message": "string"
}
```

#### Search products by code product

- method: `GET`
- endpoint: `/api/v1/products/search/{code}`
- header:
    - Accept: `application/json`
    - Authorization: Bearer `token`
- body:
- response:
    - success:
```json
[
    {
        "id": "long",
        "code": "char",
        "name": "string",
        "quantifier": "string",
        "quantity": "int",
        "created_at": "timestamps",
        "updated_at": "timestamps"
    },
    {
        "id": "long",
        "code": "char",
        "name": "string",
        "quantifier": "string",
        "quantity": "int",
        "created_at": "timestamps",
        "updated_at": "timestamps"
    }
]
```  

- error:
```json
{
    "message": "string"
}
```
