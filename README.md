
# Universidad Florencio del Castillo - Ingeniería Informática

**Desarrollo con Plataformas abiertas**

**Proyecto # 1 - Tienda de Ropa**

**Integrantes del Proyecto:**

**Yuliana Picado Calderón - Daniela Garita Araya**

**Profesor:**

**Daniel Bogarín Granados**

----


## DESCRIPCIÓN DEL PROYECTO 

El siguiente proyecto se basa en crear una base de datos enfocada en una tienda da ropa. En dicha base de datos se van a almacenar toda la información referente a la venta y compra de las prendas tanto femenina como masculina.

Dicho proyecto se desarrollará utilizando GitHub para la recreación del repocitorio, se utilirá también XAMPP y MySQL para el desrrollo de la base de datos.

La función de dicho proyecto será crear una base de datos donde se visualize todo el proceso de ingreso, contol de venta, manejo de inventarios y almacenamiento de información privada e importante para el flujo de trabajo de la tieda de ropa.

---

















## Diagrama de Estructura de la Base de Datos

Lo siguiente es una explicación detallada de lo que será la base de datos de dicho proyecto, en el cual se desglosa el contenido de cada una de las tablas, se identifica sus llames y primarias y también cada una de las relaciones que hay entre algunas tablas, esto con el fin de que la base de datos sea funcional.  Además, al final de la explicación se muestra una imagen del resultado final, es decir la estructura de la base de datos. 

### BASE DE DATOS


**1. Tabla Proveedor:**

Campos:

```javascript
   id_proveedor (PK)
   nombre_proveedor
   direccion
   correo_proveedor
```

**Relación:** Un proveedor puede ofrecer varias marcas. Está relacionado con la tabla “Marca” mediante la clave foránea **id_proveedor.**

---


**2. Tabla Marca:**

Campos:

```javascript
   id_marca (PK)
   id_proveedor (FK)
   nombre_marca
   país
```

**Relación**: Cada marca pertenece a un proveedor, pero una marca puede estar asociada a muchas prendas. Esta tabla tiene una relación de muchos a uno con la tabla “Proveedor” y de uno a muchos con la tabla Prenda.

---


**3. Tabla Prenda:**

Campos:

```javascript
   id_prenda (PK)
   id_marca (FK) 
   nombre_prenda
   descripcion
   color
   talla
   precio
```

**Relación:** Cada prenda pertenece a una marca, también, cada prenda está asociada a los detalles de ventas, es decir con la tabla “Detalle_venta” y con la tabla “inventario”.

---



**4. Tabla Inventario:**

Campos:

```javascript
   id_inventario (PK)
   id_prenda (FK)
   id_proveedor (FK)
   cant_en_stock.
   fecha_de_recibo
```

 
**Relación:** El inventario está vinculado tanto a la tabla prendas como a la tabla proveedores, mostrando qué cantidad de cada prenda está disponible y quién la suministró.

---


**5. Tabla Cliente:**

Campos:

```javascript
   id_cliente (PK)
   nombre_cliente
   apellidos_cliente
   correo
   telefono
   direccion
```
 
**Relación:** La tabla clientes está relacionada con las "ventas finales" de la tabla venta_final, el fin de identificar quién realizó una compra.

---


**6. Tabla venta_final:**

Campos:

```javascript
   id_venta_final (PK)
   id_cliente (FK)
   id_detalle_venta (FK)
   fecha_venta_final
   total_compra
```
 
**Relación:** Relaciona un cliente con el detalle de venta, indicando qué y cuánto compró el cliente, es decir es la especificación del pedido del cliente. 

---


**7. Tabla Detalle_venta:**

Campos:

```javascript
   id_detalle_venta (PK)
   id_prenda (FK)
   cantidad
```
 
**Relación:** Relaciona una prenda con la venta final, indicando cuántas unidades de una prenda específica fueron compradas en una venta.

---


## Relaciones Globales:

**- Proveedor-Marca-Prenda:** Un proveedor suministra varias marcas, y cada marca tiene varias prendas.

**- Inventario:** Lleva el control de las prendas disponibles, relacionándolas con su proveedor y los detalles de la cantidad.

**- Cliente-Venta Final-Detalle de Venta-Prenda:** Un cliente realiza una compra, que contiene varias prendas. Esto permite registrar las prendas vendidas, la cantidad y los clientes que las compraron.

---








 







## Diagrama de la Base de Datos 

![image](https://github.com/user-attachments/assets/91fd59a2-f686-4eb3-9b23-38cea05157ae)

---

# Segundo avance

## Explicación de los endpoints de la API

## Tabla Cliente

#### 1. Obtener todas los clientes

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente
* Descripción: Obtiene una lista de todos los clientes disponibles en el sistema.

#### Ejemplo de respuesta: 
```
[
        {
            "id_cliente": 203910764,
            "nombre_cliente": "Marta",
            "apellidos_cliente": "Lorenzo Fuentes",
            "correo": "fuenteslo@gmail.com",
            "telefono": 75143696,
            "direccion": "Alajuela, Atenas, Mercedes"
        },
        {
            "id_cliente": 302350969,
            "nombre_cliente": "Diana",
            "apellidos_cliente": "Perez Solis",
            "correo": "perdiana@gmail.com",
            "telefono": 60892351,
            "direccion": "Heredia, Belen, San Joaquin"
        }
]
```
#### 2. Obtener clientes por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=203910764
* Descripción: Obtiene una lista de todos los clientes por ID  disponibles en el sistema.

#### Ejemplo de respuesta: 

```
{
    "Resultado": {
        "id_cliente": 203910764,
        "nombre_cliente": "Marta",
        "apellidos_cliente": "Lorenzo Fuentes",
        "correo": "fuenteslo@gmail.com",
        "telefono": 75143696,
        "direccion": "Alajuela, Atenas, Mercedes",
        "id_venta": 0
    }
}
```
#### 3. Crear datos de clientes

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente
* Descripción: Crear un registro de cliente en el sistema.

#### Ejemplo de respuesta: 

```
{
    "id_cliente": 404480223,
    "nombre_cliente": "Lucas",
    "apellidos_cliente": "Lopez Aguilar",
    "correo": "luloag@gmail.com",
    "telefono": 87523695,
    "direccion": "Calle de la sirena, Cartago, Costa Rica"
}
 
{"Mensaje":"Se ingreso datos de un cliente nuevo."}

```


#### 4. Actualizar datos de clientes

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=404480223
* Descripción: Actualizar un registro de cliente en el sistema.
#### Ejemplo de respuesta:

```
{
    "id_cliente": 404480223,
    "nombre_cliente": "Lucas",
    "apellidos_cliente": "Lopez Aguilar",
    "correo": "luloag@gmail.com",
    "telefono": 87523695,
    "direccion": "San Pedro, San Jose, Costa Rica"
}
 
{"Mensaje":"El cliente con ID 404480223 fue actualizado exitosamente."}
 ```

  
#### 5. Eliminar datos de clientes

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=404480223
* Descripción: Eliminar un registro de la tabla Cliente por medio de un ID.

#### Ejemplo de respuesta:
 ```
{"Mensaje":"El cliente con ID 404480223 fue eliminada exitosamente."}
 ```
---

## Tabla Detalle Venta

#### 1. Obtener todas los registros de Detalle venta

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta
* Descripción: Obtiene una lista de todos los detalles de venta disponibles en el sistema.
  
#### Ejemplo de respuesta:
 ```
 http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalle_venta
```
```
{
    "Resultado": [
        {
            "id_detalle_venta": 10,
            "id_prenda": 57,
            "cantidad": 2
        },
        {
            "id_detalle_venta": 20,
            "id_prenda": 12,
            "cantidad": 25
        }

 ```


#### 2. Obtener detalles de venta por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta?id_detalle_venta=10
* Descripción: Obtiene una lista de todos los detalles de venta por ID  disponibles en el sistema.
  
#### Ejemplo de respuesta:

```
http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalle_venta?id_detalle_venta=10
```
```
{
    "Resultado": {
        "id_detalle_venta": 10,
        "id_prenda": 57,
        "cantidad": 2
    }
}
```
#### 3. Crear datos de detalles de venta

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta
* Descripción: Crear un registro de detalle venta en el sistema.

#### Ejemplo de respuesta:

```
http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalle_venta
```
```
{
        "id_detalle_venta": 80,
        "id_prenda": 32,
        "cantidad": 10
    }
{"Mensaje":"Se ingreso datos de un detalle de venta nuevo."}
```

#### 4. Actualizar datos de detalles de venta

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta?id_detalle_venta=80
* Descripción: Actualizar un registro de detalle venta en el sistema.
  
#### Ejemplo de respuesta:
```
http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalle_venta?id_detalle_venta=80
```
```
{
        "id_detalle_venta": 80,
        "id_prenda": 32,
        "cantidad": 35
    }
{"Mensaje":"La prenda con ID 80 fue actualizada exitosamente."}
```
 
#### 5. Eliminar datos de detalles de venta

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_detalle_venta=80
* Descripción: Eliminar un registro de la tabla detalle_venta por medio de un ID.
#### Ejemplo de respuesta:

```
http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalle_venta?id_detalle_venta=80
```
```

{"Mensaje":"La prenda con ID 80 fue eliminada exitosamente."}
```
---
## Tabla Inventario

#### 1. Obtener todas los registros de Inventario

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario
* Descripción: Obtiene una lista de todos los datos de inventario disponibles en el sistema.
  #### Ejemplo de respuesta:
  
```
  {
    "Resultado": [
        {
            "id_inventario": 1,
            "id_prenda": 57,
            "id_proveedor": 1479,
            "cant_en_stock": 20,
            "fecha_de_recibo": "2023-12-15"
        },
        {
            "id_inventario": 6,
            "id_prenda": 30,
            "id_proveedor": 7782,
            "cant_en_stock": 100,
            "fecha_de_recibo": "2023-10-05"
        }
```

#### 2. Obtener detalles de Inventario por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario?id_inventario=1
* Descripción: Obtiene una lista de todos los datos de inventario por ID  disponibles en el sistema.
  
#### Ejemplo de respuesta:
```
{
    "Resultado": {
        "id_inventario": 13,
        "id_prenda": 30,
        "id_proveedor": 6981,
        "cant_en_stock": 95,
        "fecha_de_recibo": "2024-04-15"
    }
}
```

#### 3. Crear datos de Inventario

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario
* Descripción: Crear un registro en nuevo de Inventario en el sistema.

#### Ejemplo de respuesta:

```
{
"id_inventario": 14,
"id_prenda": 28,
"id_proveedor": 2498,
"cant_en_stock": 55,
"fecha_de_recibo": "2024-10-20"
}
 
{"Mensaje":"Se ingres\u00f3 datos de un inventario nuevo."}

```

#### 4. Actualizar datos de Inventario

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario?id_inventario=14
* Descripción: Actualizar un dato de Inventario por medio de un ID en el sistema.

#### Ejemplo de respuesta:

```
{
"id_inventario": 14,
"id_prenda": 28,
"id_proveedor": 3572,
"cant_en_stock": 55,
"fecha_de_recibo": "2022-11-15"

{"Mensaje":"La prenda con ID 14 fue actualizada exitosamente."}
}
```

#### 5. Eliminar datos de detalles de venta

* Método:DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario?id_inventario=1
* Descripción: Eliminar un dato de Inventario por medio de un ID en el sistema.
#### Ejemplo de respuesta:

```
{"Mensaje":"La prenda con ID 14 fue eliminada exitosamente."}
```
---
## Tabla Marca

#### 1. Obtener todas los registros de Marca

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca
* Descripción: Obtiene una lista de todos los datos de marca disponibles en el sistema.
#### Ejemplo de respuesta:

```
{
    "Resultado": [
        {
            "id_marca": 41,
            "nombre_marca": "Adidas",
            "pais": "Alemania"
        },
        {
            "id_marca": 193,
            "nombre_marca": "Prada",
            "pais": "Italia"
        }
```

#### 2. Obtener detalles de Marca por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca?id_marca=41
* Descripción: Obtiene el registro de una marca por medio de un ID.
 #### Ejemplo de respuesta:

```
 {
    "Resultado": {
        "id_marca": 218,
        "id_proveedor": 2254,
        "nombre_marca": "COS",
        "pais": "Suecia"
    }
}
```

#### 3. Crear datos de Marca

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca
* Descripción: Crea un nuevo registro de marca en el sistema.
 #### Ejemplo de respuesta:
```
{
 "id_marca": 223,
 "id_proveedor": 2488,
  "nombre_marca": "Finder",
  "pais": "Colombia"
}
 
{"Mensaje":"Se ingreso datos de un inventario nuevo."}
```

#### 4. Actualizar datos de Marca

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca?id_marca=223
* Descripción: Se actualiza un registro de marca en específico por medio de un ID.
 #### Ejemplo de respuesta:
 ```
 {
 "id_marca": 223,
 "id_proveedor": 2488,
  "nombre_marca": "Parce",
  "pais": "Colombia"
}
 
{"Mensaje":"La prenda con ID 14 fue actualizada exitosamente."}
``` 
#### 5. Eliminar datos de detalles de Marca

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca?id_marca=223
* Descripción: Se elimina un registro de marca por medio de un ID en específico. 
 #### Ejemplo de respuesta:
 ```
{"Mensaje":"La prenda con ID 223 fue eliminada exitosamente."}
```
---
## Tabla Prenda

#### 1. Obtener todas los registros de Prenda

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda
* Descripción: Obtiene todos los registros de Prenda en el sistema.
  
#### Ejemplo de respuesta:
```
{
    "Resultado": [
        {
            "id_prenda": 12,
            "id_marca": 41,
            "nombre_prenda": "Pantalón Deportivo SST Bonded",
            "descripcion": "El equilibrio perfecto entre comodidad y estilo, este pantalón deportivo adidas es una adición perfe",
            "color": "negro",
            "talla": "S",
            "precio": "1.500"
        },
        {
            "id_prenda": 21,
            "id_marca": 215,
            "nombre_prenda": "Camiseta Básica",
            "descripcion": "Camiseta de algodón suave",
            "color": "Blanco",
            "talla": "M",
            "precio": "102000.000"
        }
```

#### 2. Obtener detalles de Prenda por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda?id_prenda=57
* Descripción: Obtiene un dato en específico de Prenda por medio de un ID.
  
#### Ejemplo de respuesta:
```
{
    "Resultado": {
        "id_prenda": 57,
        "id_marca": 236,
        "nombre_prenda": "Chaqueta en mezcla de lana",
        "descripcion": "Chaqueta en mezcla de lana con cuello redondo y frente cruzado con botón arriba. Modelo de corte hol",
        "color": "Gris Jaspeado",
        "talla": "M",
        "precio": "159000.000"
    }
}
```

#### 3. Crear datos de Prenda

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda
* Descripción: Crea un nuevo registro de Prenda en el sistema.
  
#### Ejemplo de respuesta:
```
{
    "id_prenda": 35,
    "id_marca": 219,
    "nombre_prenda": "Blusa Casual",
    "descripcion": "Blusa de algodón, con detalles bordados a mano",
    "color": "Azul",
    "talla": "M",
    "precio": 25000
}
 
{"Mensaje":"Se ingreso datos de una prenda nueva."}
```
#### 4. Actualizar datos de Prenda

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda?id_prenda=35
* Descripción: Actualiza un registro de prenda en específico por medio de un ID.
  
#### Ejemplo de respuesta:
```
{
    "id_prenda": 35,
    "id_marca": 219,
    "nombre_prenda": "Blusa Basica",
    "descripcion": "Blusa de algodón, con detalles bordados a mano",
    "color": "Verde Musgo",
    "talla": "M",
    "precio": 25000
}
 
{"Mensaje":"La prenda con ID 35 fue actualizada exitosamente."}
```
#### 5. Eliminar datos de detalles de Prenda

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda?id_prenda=35
* Descripción: Permite eliminar un regsitro de Prenda por medio de un ID.

#### Ejemplo de respuesta:
```
{"Mensaje":"La prenda con ID 35 fue eliminada exitosamente."}
```
---
## Tabla Proveedor

#### 1. Obtener todas los registros de Proveedor

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor
* Descripción: Obtiene todos los registros de Proveedor en el sistema.
  
#### Ejemplo de respuesta:
```
{
    "Resultado": [
        {
            "id_proveedor": 1234,
            "nombre_proveedor": "Proveedor Moda",
            "direccion": "Av. Principal 123",
            "correo_proveedor": "contacto@moda.com"
        },
        {
            "id_proveedor": 1479,
            "nombre_proveedor": "Tecorfil",
            "direccion": " Costado oeste del salon comunal de Libe",
            "correo_proveedor": "productos@tecorfil.cr"
        }
 ``` 

#### 2. Obtener detalles de Proveedor por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor?id_proveedor=2477
* Descripción: Obtiene un registro en específico de Proveedor por medio de un ID.
  
#### Ejemplo de respuesta:
```
{
    "Resultado": {
        "id_proveedor": 2477,
        "nombre_proveedor": "Nike Inc.",
        "direccion": "One Bowerman Dr, Beaverton",
        "correo_proveedor": "ventas@nike.com"
    }
}
``` 
#### 3. Crear datos de Proveedor

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor
* Descripción: Permite crear un registro nuevo para Proveedor en el sistema.

#### Ejemplo de respuesta:
```
{
"id_proveedor": 2510,
"nombre_proveedor": "Pretty Style",
"direccion": "Avenida de la Rosa,Alajuela,Costa Rica",
"correo_proveedor": "pretty@style.com"
}
 
{"Mensaje":"Se ingreso datos de un proveedor nuevo."}
```

#### 4. Actualizar datos de Proveedor

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor?id_proveedor=2510
* Descripción: Permite actualizar un dato de proveedor por medio de un ID en específico.
  
#### Ejemplo de respuesta:
```
{
"id_proveedor": 2510,
"nombre_proveedor": "Prendas Modernas",
"direccion": "Avenida de la Rosa,Alajuela,Costa Rica",
"correo_proveedor": "modernas@style.com"
}
 
{"Mensaje":"La prenda con ID 2510 fue actualizada exitosamente."}
```
#### 5. Eliminar datos de detalles de Proveedor

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor?id_proveedor=2510
* Descripción: Permite eliminar un registro de Proveedor en el sistema.
#### Ejemplo de respuesta:
```
{"Mensaje":"La prenda con ID 2510 fue eliminada exitosamente."}
```
---
## Tabla Venta final

#### 1. Obtener todas los registros de Venta final

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal
* Descripción: Obtiene todos los registros de Venta final en el sistema.
  
#### Ejemplo de respuesta:
```
{
    "Resultado": [
        {
            "id_venta": 1,
            "id_cliente": 305810963,
            "id_detalle_venta": 20,
            "fecha_venta_final": "2023-12-13",
            "total_venta": "25000.000"
        },
        {
            "id_venta": 1001,
            "id_cliente": 302350969,
            "id_detalle_venta": 10,
            "fecha_venta_final": "2024-06-12",
            "total_venta": "318000.000"
        }
```

#### 2. Obtener detalles de Venta final por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal?id_venta=1010
* Descripción: Obtiene un registro específico de Venta Final por medio de un ID en específico.
#### Ejemplo de respuesta:
```
{
    "Resultado": {
        "id_venta": 1010,
        "id_cliente": 304870585,
        "id_detalle_venta": 70,
        "fecha_venta_final": "2024-08-15",
        "total_venta": "68000.000"
    }
}
```

#### 3. Crear datos de Venta final

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal
* Descripción: Permite crear un registro nuevo de venta final en el sistema.
  
#### Ejemplo de respuesta:
```
 {
    "id_venta": 1011,
    "id_cliente": 605480529,
    "id_detalle_venta": 72,
    "fecha_venta_final": "2024-09-20",
    "total_venta": "78000.000"
}
{"Mensaje":"Se ingreso datos de una venta final nueva."}
```

#### 4. Actualizar datos de Venta final

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal?id_venta=1011
* Descripción: Permite actualizar un registro de Venta Final por medio de un ID en específico.

#### Ejemplo de respuesta:
```
 {
    "id_venta": 1011,
    "id_cliente": 605480529,
    "id_detalle_venta": 72,
    "fecha_venta_final": "2024-11-02",
    "total_venta": "15000.000"
}
 
{"Mensaje":"La prenda con ID 1011 fue actualizada exitosamente."}
```
#### 5. Eliminar datos de detalles de Venta final

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal?id_venta=1011
* Descripción: Permite eliminar un regsitro de Venta final por medio de un ID en específico.
#### Ejemplo de respuesta:

``` 
{"Mensaje":"La prenda con ID 1011 fue eliminada exitosamente."}
```

