
# Universidad Florencio del Castillo - Ingeniería Informática

**Desarrollo con Plataformas abiertas**

**Proyecto # 1 - Tienda de Ropa**

**Integrantes del Proyecto:**

**Yuliana Picado Calderón - Daniela Garita Arya**

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

#### 2. Obtener clientes por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=203910764

#### 3. Crear datos de clientes

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente

#### 4. Actualizar datos de clientes

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=203910764
  
#### 5. Eliminar datos de clientes

* Método:DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=203910764

---

### Tabla Detalle Venta

#### 1. Obtener todas los registros de Detalle venta

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta

#### 2. Obtener detalles de venta por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta?id_detalle_venta=10

#### 3. Crear datos de detalles de venta

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta

#### 4. Actualizar datos de detalles de venta

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/detalleVenta?id_detalle_venta=10

#### 5. Eliminar datos de detalles de venta

* Método:DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_detalle_venta=10

---
### Tabla Inventario

#### 1. Obtener todas los registros de Inventario

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario

#### 2. Obtener detalles de Inventario por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario?id_inventario=1

#### 3. Crear datos de Inventario

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario

#### 4. Actualizar datos de Inventario

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario?id_inventario=1

#### 5. Eliminar datos de detalles de venta

* Método:DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/inventario?id_inventario=1

---
### Tabla Marca

#### 1. Obtener todas los registros de Marca

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca

#### 2. Obtener detalles de Marca por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca?id_marca=41

#### 3. Crear datos de Marca

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca

#### 4. Actualizar datos de Marca

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca?id_marca=41

#### 5. Eliminar datos de detalles de Marca

* Método:DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marca?id_marca=41

---
### Tabla Prenda

#### 1. Obtener todas los registros de Prenda

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda

#### 2. Obtener detalles de Prenda por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda?id_prenda=12

#### 3. Crear datos de Prenda

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda

#### 4. Actualizar datos de Prenda

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda?id_prenda=12

#### 5. Eliminar datos de detalles de Prenda

* Método:DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prenda?id_prenda=12


---
### Tabla Proveedor

#### 1. Obtener todas los registros de Proveedor

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor

#### 2. Obtener detalles de Proveedor por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor?id_proveedor=1234

#### 3. Crear datos de Proveedor

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor

#### 4. Actualizar datos de Proveedor

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor?id_proveedor=1234

#### 5. Eliminar datos de detalles de Proveedor

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/proveedor?id_proveedor=1234

---
### Tabla Venta final

#### 1. Obtener todas los registros de Venta final

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal

#### 2. Obtener detalles de Venta final por ID

* Método: GET
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal?id_venta=1001

#### 3. Crear datos de Venta final

* Método: POST
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal

#### 4. Actualizar datos de Venta final

* Método: PUT
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal?id_venta=1001

#### 5. Eliminar datos de detalles de Venta final

* Método: DELETE
* URL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/ventaFinal?id_venta=1001


