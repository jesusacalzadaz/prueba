
# Prueba Jesus Calzada

Restful


## Instalación

1- Descargar proyecto en el servidor Web

2- Apuntar la raiz del servidor a la carpeta public

3- Abrir la consola en la ruta del proyecto, y ejectuar los siguientes comandos para completar dependencias.


```bash
  composer install 
  php artisan key:generate
```

4- Ejecutar los siguientes comandos para crear y poblar la base de datos

```bash
  php artisan migrate 
  php artisan db:seed
```
5- El usuario para generar token de acceso a través de login es el siguiente. 

```bash
  usuario : jesus@buzon.digital
  Password : 1245678
```


## API Reference

#### Login

```http
  POST /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. Your API key |
| `password` | `string` | **Required**. Your API key |

#### Get regions

```http
  GET /api/regions
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Token barer`      | `string` | **Required**.  |

#### Get Communes

```http
  POST /api/communes/{id_reg}
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Token barer`      | `string` | **Required**.  |

#### Get Customer by dni

```http
  GET /api/customer/bydni/${id}
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Token barer`      | `string` | **Required**.  |


#### Get Customer by email

```http
  GET /api/customer/byemail/${id}
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Token barer`      | `string` | **Required**.  |

#### Create customer

```http
  POST /api/customer
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Token barer`      | `string` | **Required**.  |


| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `dni` | `string(45)` | **Required**. Your API key |
| `id_reg` | `integer` | **Required**. Your API key |
| `id_com` | `integer` | **Required**. Your API key |
| `email` | `string(120)` | **Required**. Your API key |
| `name` | `string(45)` | **Required**. Your API key |
| `last_name` | `string(45)` | **Required**. Your API key |
| `address` | `string(255)` |  |


#### Delete Customer

```http
  DELETE /api/customers/bydni/${id}
```

| Header | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Token barer`      | `string` | **Required**.  |


## Demo

https://prueba.jesus.buzon.digital


## Coleccion para hacer pruebas con Postman

https://prueba.jesus.buzon.digital/PruebaJesusCalzada.postman_collection.json


## Desarrollo

1- Se utilizo Laravel 9

2- Para el manejo de tokens se uso Laravel Sanctum, modificando el método del modelo user para generar el token con las especificaciones.

3- Para el caso de la válidacion del token , se uso el middleware de Sanctum, y se modifico el response para cumplir con las especificaciones.

4- Para el caso de validar datos recibidos, se utilizo RequestForm, 

5- Para guardar logs, se utiliza un middleware para obtener el request y response, estos se guardar en los logs de laravel.logs



