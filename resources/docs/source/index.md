---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_f7b7ea397f8939c8bb93e6cab64603ce -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/documentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/documentation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/documentation`


<!-- END_f7b7ea397f8939c8bb93e6cab64603ce -->

<!-- START_fd7a1e83248b4621afb675822d835f2b -->
## Dump api-docs content endpoint. Supports dumping a json, or yaml file.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Unable to generate documentation file to: \"\/home\/alaa\/Bureau\/Projet golf\/golf\/theGolf\/storage\/api-docs\/api-docs.json\". Please make sure directory is writable. Error: Required @OA\\Info() not found"
}
```

### HTTP Request
`GET docs/{jsonFile?}`


<!-- END_fd7a1e83248b4621afb675822d835f2b -->

<!-- START_1a23c1337818a4de9e417863aebaca33 -->
## docs/asset/{asset}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/docs/asset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/docs/asset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "(1) - this L5 Swagger asset is not allowed"
}
```

### HTTP Request
`GET docs/asset/{asset}`


<!-- END_1a23c1337818a4de9e417863aebaca33 -->

<!-- START_a2c4ea37605c6d2e3c93b7269030af0a -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/oauth2-callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/oauth2-callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/oauth2-callback`


<!-- END_a2c4ea37605c6d2e3c93b7269030af0a -->

<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT \
    "http://localhost/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## api/register
> Example request:

```bash
curl -X POST \
    "http://localhost/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## api/logout
> Example request:

```bash
curl -X POST \
    "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

<!-- START_426476cb969c1d783eb02dd3d2e48f4a -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"tempore","sexe":"incidunt","telephone":9,"handicap":10,"depart":"sit"}'

```

```javascript
const url = new URL(
    "http://localhost/api/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "tempore",
    "sexe": "incidunt",
    "telephone": 9,
    "handicap": 10,
    "depart": "sit"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess",
    "data": {
        "id": 51,
        "name": "salahssss",
        "email": "tests1@gmail.com",
        "email_verified_at": null,
        "created_at": "2020-10-14T10:17:55.000000Z",
        "updated_at": "2020-10-14T10:22:16.000000Z",
        "telephone": "25654787",
        "photo": null,
        "handicap": "97",
        "sexe": "femme",
        "dateDeNaissance": "1998-05-17",
        "depart_id": 1,
        "sac_id": 51
    }
}
```

### HTTP Request
`PUT api/update`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | The name of the user. Example : salah
        `sexe` | string |  optional  | The sexe of the partie. Example : homme
        `telephone` | integer |  optional  | The telephone of the user. Example : 55 252 364
        `handicap` | integer |  optional  | The handicap of the user. Example : 55
        `depart` | string |  optional  | The depart of the user. Example : Jaune
    
<!-- END_426476cb969c1d783eb02dd3d2e48f4a -->

<!-- START_487f4a80bf4a175e19379bf72e038bec -->
## api/updateImage
> Example request:

```bash
curl -X POST \
    "http://localhost/api/updateImage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/updateImage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateImage`


<!-- END_487f4a80bf4a175e19379bf72e038bec -->

<!-- START_a114db8028728917d2c0ceca4f8a8395 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/show" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/show"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess",
    "data": {
        "name": "salahssss",
        "email": "tests1@gmail.com",
        "dateDeNaissance": "1998-05-17",
        "sexe": "femme",
        "handicap": "97",
        "depart ": "Jaune",
        "photo": null
    }
}
```

### HTTP Request
`GET api/show`


<!-- END_a114db8028728917d2c0ceca4f8a8395 -->

<!-- START_05ea96d6510eb24d0521c818adcb1e7d -->
## api/sac/ajout_baton
> Example request:

```bash
curl -X POST \
    "http://localhost/api/sac/ajout_baton" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"baton_id":9}'

```

```javascript
const url = new URL(
    "http://localhost/api/sac/ajout_baton"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "baton_id": 9
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": [
        "baton existant"
    ]
}
```
> Example response (200):

```json
{
    "message": [
        "sucess"
    ]
}
```

### HTTP Request
`POST api/sac/ajout_baton`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `baton_id` | integer |  required  | The id of the baton. Example : 9
    
<!-- END_05ea96d6510eb24d0521c818adcb1e7d -->

<!-- START_633f2e778d1e649d56bcaa28e6691df1 -->
## api/sac/voir_sac
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sac/voir_sac" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sac/voir_sac"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "batons": [
        [
            {
                "id": 13,
                "marque": null,
                "photo": null,
                "nom": "sandwedge",
                "favori": null,
                "distance": null,
                "created_at": null,
                "updated_at": null
            }
        ],
        [
            {
                "id": 11,
                "marque": null,
                "photo": null,
                "nom": "fer9",
                "favori": null,
                "distance": null,
                "created_at": null,
                "updated_at": null
            }
        ],
        [
            {
                "id": 10,
                "marque": null,
                "photo": null,
                "nom": "fer7",
                "favori": null,
                "distance": null,
                "created_at": null,
                "updated_at": null
            }
        ],
        [
            {
                "id": 9,
                "marque": null,
                "photo": null,
                "nom": "fer5",
                "favori": null,
                "distance": null,
                "created_at": null,
                "updated_at": null
            }
        ],
        [
            {
                "id": 8,
                "marque": null,
                "photo": null,
                "nom": "putter",
                "favori": null,
                "distance": null,
                "created_at": null,
                "updated_at": null
            }
        ],
        [
            {
                "id": 12,
                "marque": null,
                "photo": null,
                "nom": "hybride",
                "favori": null,
                "distance": null,
                "created_at": null,
                "updated_at": null
            }
        ]
    ],
    "balles": [
        [
            {
                "id": 1,
                "marque": "balle",
                "photo": null,
                "created_at": null,
                "updated_at": null
            }
        ]
    ]
}
```

### HTTP Request
`GET api/sac/voir_sac`


<!-- END_633f2e778d1e649d56bcaa28e6691df1 -->

<!-- START_68185c7b0afe95fcbed962c31036ca0a -->
## api/sac/supprimer_baton
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/sac/supprimer_baton" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"baton_id":6}'

```

```javascript
const url = new URL(
    "http://localhost/api/sac/supprimer_baton"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "baton_id": 6
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": [
        "baton inexistant"
    ]
}
```
> Example response (200):

```json
{
    "message": [
        "sucess"
    ]
}
```

### HTTP Request
`DELETE api/sac/supprimer_baton`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `baton_id` | integer |  required  | The id of the baton. Example : 9
    
<!-- END_68185c7b0afe95fcbed962c31036ca0a -->

<!-- START_17bee535c26d7073ef30c342005873eb -->
## api/sac/modifier_sac
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/sac/modifier_sac" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"baton_id1":1,"baton_id2":5,"baton_id3":17,"baton_id4":7,"baton_id5":5,"baton_id6":18,"baton_id7":3,"baton_id8":12,"baton_id9":1,"baton_id10":15,"baton_id11":7,"baton_id12":7,"baton_id13":3,"baton_id14":4}'

```

```javascript
const url = new URL(
    "http://localhost/api/sac/modifier_sac"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "baton_id1": 1,
    "baton_id2": 5,
    "baton_id3": 17,
    "baton_id4": 7,
    "baton_id5": 5,
    "baton_id6": 18,
    "baton_id7": 3,
    "baton_id8": 12,
    "baton_id9": 1,
    "baton_id10": 15,
    "baton_id11": 7,
    "baton_id12": 7,
    "baton_id13": 3,
    "baton_id14": 4
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess"
}
```

### HTTP Request
`DELETE api/sac/modifier_sac`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `baton_id1` | integer |  required  | The id of the baton. Example : 1
        `baton_id2` | integer |  required  | The id of the baton. Example : 1
        `baton_id3` | integer |  required  | The id of the baton. Example : 1
        `baton_id4` | integer |  required  | The id of the baton. Example : 1
        `baton_id5` | integer |  required  | The id of the baton. Example : 1
        `baton_id6` | integer |  required  | The id of the baton. Example : 1
        `baton_id7` | integer |  required  | The id of the baton. Example : 1
        `baton_id8` | integer |  required  | The id of the baton. Example : 1
        `baton_id9` | integer |  required  | The id of the baton. Example : 1
        `baton_id10` | integer |  required  | The id of the baton. Example : 1
        `baton_id11` | integer |  required  | The id of the baton. Example : 1
        `baton_id12` | integer |  required  | The id of the baton. Example : 1
        `baton_id13` | integer |  required  | The id of the baton. Example : 1
        `baton_id14` | integer |  required  | The id of the baton. Example : 1
    
<!-- END_17bee535c26d7073ef30c342005873eb -->

<!-- START_96569bd86d8ddfbb790f300e7dc29ae3 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/message/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":8}'

```

```javascript
const url = new URL(
    "http://localhost/api/message/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 8
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/message/store`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | integer |  required  | The id of the user. Example : 9
    
<!-- END_96569bd86d8ddfbb790f300e7dc29ae3 -->

<!-- START_e9a11a13f6f1cd6b3b3902218f4bd77c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/baton/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/baton/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "marque": "Putter",
            "photo": "putter.png",
            "nom": "Putter",
            "favori": null,
            "distance": null,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "marque": "Wedge",
            "photo": "wedge.png",
            "nom": "Sand Wedge",
            "favori": null,
            "distance": 97,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 5",
            "favori": null,
            "distance": 175,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 7",
            "favori": null,
            "distance": 150,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 9",
            "favori": null,
            "distance": 130,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 6,
            "marque": "Hybrid",
            "photo": "hybrid.png",
            "nom": "Hybrid",
            "favori": null,
            "distance": 215,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 7,
            "marque": "Driver",
            "photo": "driver.png",
            "nom": "Driver",
            "favori": null,
            "distance": 255,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 8,
            "marque": "Bois",
            "photo": "bois.png",
            "nom": "Bois 3",
            "favori": null,
            "distance": 235,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 9,
            "marque": "Wedge",
            "photo": "wedge.png",
            "nom": "Pitch Wedge",
            "favori": null,
            "distance": 119,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 10,
            "marque": "Wedge",
            "photo": "wedge.png",
            "nom": "Gap Wedge",
            "favori": null,
            "distance": 108,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 11,
            "marque": "Wedge",
            "photo": "wedge.png",
            "nom": "Lob Wedge",
            "favori": null,
            "distance": 84,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 12,
            "marque": "Bois",
            "photo": "bois.png",
            "nom": "Bois 4",
            "favori": null,
            "distance": 220,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 13,
            "marque": "Bois",
            "photo": "bois.png",
            "nom": "Bois 2",
            "favori": null,
            "distance": 245,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 14,
            "marque": "Bois",
            "photo": "bois.png",
            "nom": "Bois 1",
            "favori": null,
            "distance": 255,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 15,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 2",
            "favori": null,
            "distance": 210,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 16,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 3",
            "favori": null,
            "distance": 195,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 17,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 4",
            "favori": null,
            "distance": 185,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 18,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 6",
            "favori": null,
            "distance": 160,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 19,
            "marque": "Fer",
            "photo": "fer.png",
            "nom": "Fer 8",
            "favori": null,
            "distance": 140,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/baton/index`


<!-- END_e9a11a13f6f1cd6b3b3902218f4bd77c -->

<!-- START_9aacdeec2627b8e21168b2b1424e737c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/actualite/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/actualite/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/actualite/index`


<!-- END_9aacdeec2627b8e21168b2b1424e737c -->

<!-- START_8a0d3968a834fe1ef6830f23a1cc0db0 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/matches/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/matches/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nom": "9 trous",
        "tarif": "100",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "nom": "18 trous",
        "tarif": "155",
        "created_at": null,
        "updated_at": null
    }
]
```

### HTTP Request
`GET api/matches/index`


<!-- END_8a0d3968a834fe1ef6830f23a1cc0db0 -->

<!-- START_a037d9cb4f6725b4fa74981f87b86cc5 -->
## api/reservation/creer_une_reservation
> Example request:

```bash
curl -X POST \
    "http://localhost/api/reservation/creer_une_reservation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"match_id":11,"date_matche":"sint"}'

```

```javascript
const url = new URL(
    "http://localhost/api/reservation/creer_une_reservation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "match_id": 11,
    "date_matche": "sint"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess",
    "data": {
        "match_id": "2",
        "date_matche": "2020-09-02 14:16:30",
        "user_id": 5,
        "updated_at": "2020-10-06T09:19:54.000000Z",
        "created_at": "2020-10-06T09:19:54.000000Z",
        "id": 3
    }
}
```

### HTTP Request
`POST api/reservation/creer_une_reservation`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `match_id` | integer |  required  | The id of the match c est le nombre de trous avec le tarif . Example : 9
        `date_matche` | DateTime |  required  | The date of the match. Example : 2020-09-02 14:16:30
    
<!-- END_a037d9cb4f6725b4fa74981f87b86cc5 -->

<!-- START_3b4e6ab7f039e55d17d5312e584fd2ed -->
## api/reservation/supprimer_la_reservation
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/reservation/supprimer_la_reservation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"reseervation_id":17}'

```

```javascript
const url = new URL(
    "http://localhost/api/reservation/supprimer_la_reservation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "reseervation_id": 17
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess"
}
```
> Example response (200):

```json
{
    "message": "reservation déja supprimé"
}
```

### HTTP Request
`DELETE api/reservation/supprimer_la_reservation`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `reseervation_id` | integer |  required  | The id of the reservation . Example :9
    
<!-- END_3b4e6ab7f039e55d17d5312e584fd2ed -->

<!-- START_69d46372a182af36108a5a2cb165ab25 -->
## api/location/supprimer_location_du_panier
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/location/supprimer_location_du_panier" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"location_id":10,"reservation_id":13}'

```

```javascript
const url = new URL(
    "http://localhost/api/location/supprimer_location_du_panier"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "location_id": 10,
    "reservation_id": 13
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess"
}
```
> Example response (200):

```json
{
    "message": "location déja supprimé"
}
```

### HTTP Request
`DELETE api/location/supprimer_location_du_panier`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `location_id` | integer |  required  | The id of the location. Example : 1
        `reservation_id` | integer |  required  | The id of the reservation. Example : 1
    
<!-- END_69d46372a182af36108a5a2cb165ab25 -->

<!-- START_c89ee7f4ee0dd99ad438f0fe114e4094 -->
## api/location/ajouter_location_au_panier
> Example request:

```bash
curl -X POST \
    "http://localhost/api/location/ajouter_location_au_panier" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"location_id":18,"reservation_id":2}'

```

```javascript
const url = new URL(
    "http://localhost/api/location/ajouter_location_au_panier"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "location_id": 18,
    "reservation_id": 2
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": [
        "sucess"
    ]
}
```
> Example response (200):

```json
{
    "message": [
        "location existant"
    ]
}
```

### HTTP Request
`POST api/location/ajouter_location_au_panier`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `location_id` | integer |  required  | The id of the location. Example : 1
        `reservation_id` | integer |  required  | The id of the reservation. Example : 1
    
<!-- END_c89ee7f4ee0dd99ad438f0fe114e4094 -->

<!-- START_4b7746b68a68e5e7f25260d522c2a1c3 -->
## Voir locations disponibles .

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/location/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/location/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess",
    "data": [
        {
            "id": 1,
            "nom": "caddy",
            "tarif": "60",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "nom": "sac",
            "tarif": "20",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/location/index`


<!-- END_4b7746b68a68e5e7f25260d522c2a1c3 -->

<!-- START_15eb19dcbe1d54878c035519d7e1cbcc -->
## api/location/check_reservation
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/location/check_reservation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"reservation_id":13}'

```

```javascript
const url = new URL(
    "http://localhost/api/location/check_reservation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "reservation_id": 13
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess",
    "data": [
        {
            "id": 1,
            "reservation_id": 2,
            "location_id": 1,
            "created_at": null,
            "updated_at": null,
            "nom": "Caddy",
            "tarif": "30"
        },
        {
            "id": 2,
            "reservation_id": 2,
            "location_id": 2,
            "created_at": null,
            "updated_at": null,
            "nom": "Série Complète Callaways",
            "tarif": "50"
        }
    ],
    "date_matche": "2020-10-15 12:00:00",
    "match": [
        {
            "nom": "18 trous",
            "tarif": "155"
        }
    ]
}
```
> Example response (200):

```json
null
```

### HTTP Request
`GET api/location/check_reservation`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `reservation_id` | integer |  required  | The id of the reservation. Example : 1
    
<!-- END_15eb19dcbe1d54878c035519d7e1cbcc -->

<!-- START_3022ebb941ec2a216e5f707f014c99f5 -->
## api/parties/voir_parties
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/parties/voir_parties" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/parties/voir_parties"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "partie existant",
    "data": {
        "id": 1,
        "date": "2005-05-06 19:04:47",
        "nombre_joueurs": 3,
        "created_at": "2020-10-06 08:39:16",
        "updated_at": "2020-10-06 08:39:16",
        "parcour_id": null,
        "type": null,
        "nombre_trous": null,
        "confirmed": null
    }
}
```
> Example response (200):

```json
{
    "message": "pas de match"
}
```

### HTTP Request
`GET api/parties/voir_parties`


<!-- END_3022ebb941ec2a216e5f707f014c99f5 -->

<!-- START_3d2761208e7a32fbbec6bfd63a3e74c5 -->
## api/parties/voir_joueurs
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/parties/voir_joueurs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"partie_id":8}'

```

```javascript
const url = new URL(
    "http://localhost/api/parties/voir_joueurs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "partie_id": 8
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "success",
    "data": [
        {
            "name": "Hadhamy Rjiba",
            "email": "hadhamirjiba@test.com",
            "dateDeNaissance": "2020-10-05",
            "sexe": "homme",
            "handicap": "12",
            "depart ": "Jaune",
            "photo": null
        },
        {
            "name": "Fedi Kouzana",
            "email": "fedikouzana@test.com",
            "dateDeNaissance": "2020-10-05",
            "sexe": "homme",
            "handicap": "36",
            "depart ": "Jaune",
            "photo": null
        },
        {
            "name": "Alaa Mzoughi",
            "email": "alaamzoughi@test.com",
            "dateDeNaissance": "2020-10-05",
            "sexe": "homme",
            "handicap": "36",
            "depart ": "Jaune",
            "photo": null
        },
        {
            "name": "howhowsdgdsgsdg",
            "email": "sqdsqscccqd@gmail.com",
            "dateDeNaissance": "1998-05-17",
            "sexe": "homme",
            "handicap": "36",
            "depart ": "Jaune",
            "photo": null
        }
    ]
}
```

### HTTP Request
`GET api/parties/voir_joueurs`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `partie_id` | integer |  required  | The id of the partie. Example : 1
    
<!-- END_3d2761208e7a32fbbec6bfd63a3e74c5 -->

<!-- START_49cd4c5cc1bba871fbb96a99f115df0f -->
## api/parties/lancer_partie
> Example request:

```bash
curl -X POST \
    "http://localhost/api/parties/lancer_partie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"partie_id":10}'

```

```javascript
const url = new URL(
    "http://localhost/api/parties/lancer_partie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "partie_id": 10
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "pret a lancer"
}
```
> Example response (200):

```json
{
    "message": "partie en attente"
}
```

### HTTP Request
`POST api/parties/lancer_partie`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `partie_id` | integer |  required  | The id of the partie. Example : 1
    
<!-- END_49cd4c5cc1bba871fbb96a99f115df0f -->

<!-- START_f1bdcf59e98d891c0d0371b2a7033d81 -->
## api/parties/voir_parcours
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/parties/voir_parcours" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"partie_id":1}'

```

```javascript
const url = new URL(
    "http://localhost/api/parties/voir_parcours"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "partie_id": 1
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "nom": "panorama",
            "nombre_de_trous": 18,
            "clubHouse_id": 1,
            "created_at": "2020-09-22 11:44:15",
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/parties/voir_parcours`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `partie_id` | integer |  required  | The id of the partie. Example : 1
    
<!-- END_f1bdcf59e98d891c0d0371b2a7033d81 -->

<!-- START_dd87a0aeea0995377ac967fe51fe2874 -->
## api/parties/voir_trous
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/parties/voir_trous" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"partie_id":7}'

```

```javascript
const url = new URL(
    "http://localhost/api/parties/voir_trous"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "partie_id": 7
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 2,
            "numero": 796,
            "par": 7,
            "strokeIndex": 192663,
            "distance_trou_blanc": 10218387,
            "distance_trou_bleu": 9,
            "distance_trou_rouge": 644,
            "distance_trou_jaune": 32,
            "GPS": "1740",
            "image2D": "3",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:15",
            "updated_at": "2020-10-06 14:33:15"
        },
        {
            "id": 3,
            "numero": 637,
            "par": 233,
            "strokeIndex": 2,
            "distance_trou_blanc": 336691862,
            "distance_trou_bleu": 5229,
            "distance_trou_rouge": 723733561,
            "distance_trou_jaune": 560,
            "GPS": "781624013",
            "image2D": "50313",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:16",
            "updated_at": "2020-10-06 14:33:16"
        },
        {
            "id": 4,
            "numero": 979,
            "par": 43,
            "strokeIndex": 15241455,
            "distance_trou_blanc": 42,
            "distance_trou_bleu": 68903556,
            "distance_trou_rouge": 114631510,
            "distance_trou_jaune": 62197,
            "GPS": "1",
            "image2D": "525095315",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:16",
            "updated_at": "2020-10-06 14:33:16"
        },
        {
            "id": 5,
            "numero": 4262,
            "par": 3,
            "strokeIndex": 587508,
            "distance_trou_blanc": 15946682,
            "distance_trou_bleu": 44,
            "distance_trou_rouge": 2512641,
            "distance_trou_jaune": 6,
            "GPS": "4",
            "image2D": "4795051",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:16",
            "updated_at": "2020-10-06 14:33:16"
        },
        {
            "id": 6,
            "numero": 817,
            "par": 432,
            "strokeIndex": 33,
            "distance_trou_blanc": 3567,
            "distance_trou_bleu": 1238,
            "distance_trou_rouge": 46,
            "distance_trou_jaune": 9,
            "GPS": "3",
            "image2D": "4404",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:17",
            "updated_at": "2020-10-06 14:33:17"
        },
        {
            "id": 7,
            "numero": 674,
            "par": 17718,
            "strokeIndex": 876221101,
            "distance_trou_blanc": 427,
            "distance_trou_bleu": 2834670,
            "distance_trou_rouge": 671,
            "distance_trou_jaune": 3399,
            "GPS": "25495337",
            "image2D": "918",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:17",
            "updated_at": "2020-10-06 14:33:17"
        },
        {
            "id": 8,
            "numero": 4221306,
            "par": 7518110,
            "strokeIndex": 24510992,
            "distance_trou_blanc": 3520,
            "distance_trou_bleu": 8667,
            "distance_trou_rouge": 15401433,
            "distance_trou_jaune": 1438152,
            "GPS": "1148",
            "image2D": "2874189",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:17",
            "updated_at": "2020-10-06 14:33:17"
        },
        {
            "id": 9,
            "numero": 40994820,
            "par": 8690,
            "strokeIndex": 628509,
            "distance_trou_blanc": 15,
            "distance_trou_bleu": 77035,
            "distance_trou_rouge": 971216141,
            "distance_trou_jaune": 1294,
            "GPS": "6011806",
            "image2D": "132312235",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:17",
            "updated_at": "2020-10-06 14:33:17"
        },
        {
            "id": 10,
            "numero": 81267,
            "par": 6017564,
            "strokeIndex": 5695,
            "distance_trou_blanc": 26,
            "distance_trou_bleu": 109,
            "distance_trou_rouge": 2109,
            "distance_trou_jaune": 9,
            "GPS": "62824020",
            "image2D": "560083155",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:18",
            "updated_at": "2020-10-06 14:33:18"
        },
        {
            "id": 11,
            "numero": 799,
            "par": 6795,
            "strokeIndex": 14387,
            "distance_trou_blanc": 5100873,
            "distance_trou_bleu": 27557,
            "distance_trou_rouge": 42278,
            "distance_trou_jaune": 18,
            "GPS": "2723",
            "image2D": "15202744",
            "parcour_id": 1,
            "created_at": "2020-10-06 14:33:18",
            "updated_at": "2020-10-06 14:33:18"
        }
    ]
}
```

### HTTP Request
`GET api/parties/voir_trous`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `partie_id` | integer |  required  | The id of the partie. Example : 1
    
<!-- END_dd87a0aeea0995377ac967fe51fe2874 -->

<!-- START_ff30f6661084c21b6f4eaeee896a3e2d -->
## api/parties/index_trous
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/parties/index_trous" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/parties/index_trous"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "numero": 1,
        "par": 4,
        "strokeIndex": 12,
        "distance_trou_blanc": 364,
        "distance_trou_bleu": 344,
        "distance_trou_rouge": 394,
        "distance_trou_jaune": 328,
        "GPS": "Trou 1",
        "image2D": "trou1.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 2,
        "numero": 2,
        "par": 4,
        "strokeIndex": 8,
        "distance_trou_blanc": 388,
        "distance_trou_bleu": 366,
        "distance_trou_rouge": 313,
        "distance_trou_jaune": 346,
        "GPS": "Trou 2",
        "image2D": "trou2.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 3,
        "numero": 3,
        "par": 3,
        "strokeIndex": 18,
        "distance_trou_blanc": 157,
        "distance_trou_bleu": 142,
        "distance_trou_rouge": 97,
        "distance_trou_jaune": 132,
        "GPS": "Trou 3",
        "image2D": "trou3.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 2
    },
    {
        "id": 4,
        "numero": 4,
        "par": 4,
        "strokeIndex": 4,
        "distance_trou_blanc": 425,
        "distance_trou_bleu": 401,
        "distance_trou_rouge": 334,
        "distance_trou_jaune": 384,
        "GPS": "Trou 4",
        "image2D": "trou4.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 5,
        "numero": 5,
        "par": 5,
        "strokeIndex": 10,
        "distance_trou_blanc": 500,
        "distance_trou_bleu": 461,
        "distance_trou_rouge": 411,
        "distance_trou_jaune": 438,
        "GPS": "Trou 5",
        "image2D": "trou5.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 4
    },
    {
        "id": 6,
        "numero": 6,
        "par": 3,
        "strokeIndex": 6,
        "distance_trou_blanc": 141,
        "distance_trou_bleu": 130,
        "distance_trou_rouge": 100,
        "distance_trou_jaune": 111,
        "GPS": "Trou 6\n",
        "image2D": "trou6.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 2
    },
    {
        "id": 7,
        "numero": 7,
        "par": 4,
        "strokeIndex": 6,
        "distance_trou_blanc": 371,
        "distance_trou_bleu": 351,
        "distance_trou_rouge": 312,
        "distance_trou_jaune": 328,
        "GPS": "Trou 7",
        "image2D": "trou7.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 8,
        "numero": 8,
        "par": 4,
        "strokeIndex": 2,
        "distance_trou_blanc": 296,
        "distance_trou_bleu": 269,
        "distance_trou_rouge": 215,
        "distance_trou_jaune": 239,
        "GPS": "Trou 8",
        "image2D": "trou8.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 9,
        "numero": 9,
        "par": 5,
        "strokeIndex": 16,
        "distance_trou_blanc": 423,
        "distance_trou_bleu": 401,
        "distance_trou_rouge": 345,
        "distance_trou_jaune": 372,
        "GPS": "Trou 9",
        "image2D": "trou9.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 4
    },
    {
        "id": 10,
        "numero": 10,
        "par": 4,
        "strokeIndex": 17,
        "distance_trou_blanc": 292,
        "distance_trou_bleu": 273,
        "distance_trou_rouge": 242,
        "distance_trou_jaune": 251,
        "GPS": "Trou 10",
        "image2D": "trou10.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 11,
        "numero": 11,
        "par": 4,
        "strokeIndex": 15,
        "distance_trou_blanc": 324,
        "distance_trou_bleu": 301,
        "distance_trou_rouge": 249,
        "distance_trou_jaune": 385,
        "GPS": "Trou 11",
        "image2D": "trou11.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 12,
        "numero": 12,
        "par": 3,
        "strokeIndex": 7,
        "distance_trou_blanc": 166,
        "distance_trou_bleu": 140,
        "distance_trou_rouge": 102,
        "distance_trou_jaune": 113,
        "GPS": "Trou 12",
        "image2D": "trou12.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 2
    },
    {
        "id": 13,
        "numero": 13,
        "par": 4,
        "strokeIndex": 5,
        "distance_trou_blanc": 341,
        "distance_trou_bleu": 307,
        "distance_trou_rouge": 254,
        "distance_trou_jaune": 280,
        "GPS": "Trou 13\n",
        "image2D": "trou13.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 14,
        "numero": 14,
        "par": 4,
        "strokeIndex": 11,
        "distance_trou_blanc": 322,
        "distance_trou_bleu": 314,
        "distance_trou_rouge": 285,
        "distance_trou_jaune": 299,
        "GPS": "Trou 14",
        "image2D": "trou14.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 15,
        "numero": 15,
        "par": 3,
        "strokeIndex": 13,
        "distance_trou_blanc": 166,
        "distance_trou_bleu": 141,
        "distance_trou_rouge": 102,
        "distance_trou_jaune": 115,
        "GPS": "Trou 15",
        "image2D": "trou15.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 2
    },
    {
        "id": 16,
        "numero": 16,
        "par": 5,
        "strokeIndex": 1,
        "distance_trou_blanc": 480,
        "distance_trou_bleu": 445,
        "distance_trou_rouge": 389,
        "distance_trou_jaune": 412,
        "GPS": "Trou 16\n",
        "image2D": "trou16.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 4
    },
    {
        "id": 17,
        "numero": 17,
        "par": 4,
        "strokeIndex": 9,
        "distance_trou_blanc": 313,
        "distance_trou_bleu": 289,
        "distance_trou_rouge": 279,
        "distance_trou_jaune": 280,
        "GPS": "Trou 17",
        "image2D": "trou17.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 3
    },
    {
        "id": 18,
        "numero": 18,
        "par": 5,
        "strokeIndex": 3,
        "distance_trou_blanc": 576,
        "distance_trou_bleu": 555,
        "distance_trou_rouge": 474,
        "distance_trou_jaune": 510,
        "GPS": "Trou 18",
        "image2D": "trou18.png",
        "parcour_id": 1,
        "created_at": null,
        "updated_at": null,
        "par_gir": 4
    }
]
```

### HTTP Request
`GET api/parties/index_trous`


<!-- END_ff30f6661084c21b6f4eaeee896a3e2d -->

<!-- START_73e2342f78b155ac19cedfc3916d8b65 -->
## api/scores/jouer_trou
> Example request:

```bash
curl -X POST \
    "http://localhost/api/scores/jouer_trou" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"partie_id":6,"trou_id":17}'

```

```javascript
const url = new URL(
    "http://localhost/api/scores/jouer_trou"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "partie_id": 6,
    "trou_id": 17
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess"
}
```

### HTTP Request
`POST api/scores/jouer_trou`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `partie_id` | integer |  required  | The id of the partie. Example : 1
        `trou_id` | integer |  required  | The id of the trou. Example : 1
    
<!-- END_73e2342f78b155ac19cedfc3916d8b65 -->

<!-- START_f9b345e9dfcdb954973ce3815d15c3b9 -->
## api/scores/voir_score_apres_trou
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/scores/voir_score_apres_trou" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"score_id":12}'

```

```javascript
const url = new URL(
    "http://localhost/api/scores/voir_score_apres_trou"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "score_id": 12
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        [
            {
                "nom": "howhow",
                "photo": null,
                "valeur": 17,
                "type": "Double Bogey"
            }
        ]
    ],
    "score_id": "8"
}
```

### HTTP Request
`GET api/scores/voir_score_apres_trou`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `score_id` | integer |  required  | The id of the score. Example : 2
    
<!-- END_f9b345e9dfcdb954973ce3815d15c3b9 -->

<!-- START_20467a74c621bc515cee383bae1259e9 -->
## api/scores/voir_score_apres_match
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/scores/voir_score_apres_match" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"score_id":15}'

```

```javascript
const url = new URL(
    "http://localhost/api/scores/voir_score_apres_match"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "score_id": 15
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/scores/voir_score_apres_match`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `score_id` | integer |  required  | The id of the score. Example : 2
    
<!-- END_20467a74c621bc515cee383bae1259e9 -->

<!-- START_a3997a25ece6a0fc71eef5e15acb68cd -->
## api/scores/jouer_coup
> Example request:

```bash
curl -X POST \
    "http://localhost/api/scores/jouer_coup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"baton_id":16,"methode_id":13,"score_id":15,"balle_marque":19,"penalties":true,"sandSave":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/scores/jouer_coup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "baton_id": 16,
    "methode_id": 13,
    "score_id": 15,
    "balle_marque": 19,
    "penalties": true,
    "sandSave": false
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "passe au trou suivant"
}
```
> Example response (200):

```json
{
    "message": "jouer un autre coup",
    "numéro du coup": 16
}
```

### HTTP Request
`POST api/scores/jouer_coup`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `baton_id` | integer |  required  | The id of the baton. Example : 1
        `methode_id` | integer |  required  | The id of the methode. Example : 1
        `score_id` | integer |  required  | The id of the score. Example : 1
        `balle_marque` | integer |  required  | The balle is cored or not. Example : 0
        `penalties` | boolean |  required  | There is a penaltie or not. Example : true
        `sandSave` | boolean |  required  | the balle is sand save or not. Example : true
    
<!-- END_a3997a25ece6a0fc71eef5e15acb68cd -->

<!-- START_723898fcdb76e6d9b81010427c8ecbd4 -->
## api/scores/update_coup
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/scores/update_coup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"baton_id":4,"methode_id":7,"scoreUnitaire_id":1,"balle_marque":4,"penalties":false,"sandSave":false}'

```

```javascript
const url = new URL(
    "http://localhost/api/scores/update_coup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "baton_id": 4,
    "methode_id": 7,
    "scoreUnitaire_id": 1,
    "balle_marque": 4,
    "penalties": false,
    "sandSave": false
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess"
}
```

### HTTP Request
`PUT api/scores/update_coup`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `baton_id` | integer |  required  | The id of the baton. Example : 1
        `methode_id` | integer |  required  | The id of the methode. Example : 1
        `scoreUnitaire_id` | integer |  required  | The id of the score. Example : 1
        `balle_marque` | integer |  required  | The balle is cored or not. Example : 0
        `penalties` | boolean |  required  | There is a penaltie or not. Example : true
        `sandSave` | boolean |  required  | the balle is sand save or not. Example : true
    
<!-- END_723898fcdb76e6d9b81010427c8ecbd4 -->

<!-- START_dac406842ddcf1a4ddfbc059161092fa -->
## api/statistiques/calculer_statistiques
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/statistiques/calculer_statistiques" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"partie_id":19}'

```

```javascript
const url = new URL(
    "http://localhost/api/statistiques/calculer_statistiques"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "partie_id": 19
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "sucess"
}
```

### HTTP Request
`PUT api/statistiques/calculer_statistiques`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `partie_id` | integer |  required  | The id of the partie. Example : 1
    
<!-- END_dac406842ddcf1a4ddfbc059161092fa -->

<!-- START_859808d1f5c2c92b56ec36736b69bce7 -->
## api/statistiques/afficher_statistiques_generales
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistiques/afficher_statistiques_generales" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistiques/afficher_statistiques_generales"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "Fairway": "25",
    "Gir": "23",
    "Puts": "65",
    "SS": "47",
    "sandSaves": "66",
    "greens_in_regulation": "0",
    "putting_average": "0",
    "driving_accuracy": "44"
}
```

### HTTP Request
`GET api/statistiques/afficher_statistiques_generales`


<!-- END_859808d1f5c2c92b56ec36736b69bce7 -->

<!-- START_75149af161579c63e7c0b3e07f7d3269 -->
## api/statistiques/afficher_statistiques_par_match
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistiques/afficher_statistiques_par_match" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistiques/afficher_statistiques_par_match"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/statistiques/afficher_statistiques_par_match`


<!-- END_75149af161579c63e7c0b3e07f7d3269 -->

<!-- START_7d23e98eccc197773893a5f5c1707d86 -->
## api/statistiques/voir_most_played_club
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/statistiques/voir_most_played_club" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/statistiques/voir_most_played_club"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "baton_id": 1,
            "count": 5
        },
        {
            "baton_id": 5,
            "count": 5
        },
        {
            "baton_id": 6,
            "count": 3
        },
        {
            "baton_id": 4,
            "count": 1
        },
        {
            "baton_id": 8,
            "count": 1
        }
    ],
    "nombre frappes": 15
}
```

### HTTP Request
`GET api/statistiques/voir_most_played_club`


<!-- END_7d23e98eccc197773893a5f5c1707d86 -->

<!-- START_063eeaa32087974cc45a5ba8ac0ccc6b -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/methodes/index" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/methodes/index"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "nom": "Fairway",
            "created_at": "2020-09-22 11:44:15",
            "updated_at": null
        },
        {
            "id": 2,
            "nom": "Bunker",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "nom": "Green",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "nom": "Obstacle d'eau",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "nom": "Rough",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 6,
            "nom": "Hors Limite",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/methodes/index`


<!-- END_063eeaa32087974cc45a5ba8ac0ccc6b -->


