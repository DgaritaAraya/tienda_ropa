## Universidad Florencio del Castillo Ingeniería Informática Desarrollo con Plataformas abiertas
###  Proyecto # 1 - Tienda de Ropa
----
### Lista de integrantes del proyecto:
### Yuliana Picado Calderón 
### Daniela Garita Araya
---
### Profesor: Daniel Bogarín Granados
---





###  DESCRIPCIÓN DEL PROYECTO

El siguiente proyecto se basa en crear una página web para la venta de ropa tanto femenina como masculina. Dicho proyecto se desarrollará utilizando GitHub, Workbench.

La función de dicho proyecto será que por medio de un sitio web, los usuarios podrán visualizar todas las prendas que ofrece la tienda y puedan hacer la compra y el pago de su pedido por medio de la misma página. Se incluirá también, una base de datos en donde estará toda la información de la tienda, como sus productos y los datos de futuros clientes.

----

###  Diagrama de Estructura de la base de datos

Lo siguiente es una explicación detallada de lo que será la base de datos de dicho proyecto, en el cual se desclosa cada una de las tablas y se identifica cada uno de las relaciones que tiene con otra tabla.  Al final se adjunta una imagen con la estructura de la base de datos. 


**1. Tabla Proveedor:**
   Campos:
   id_proveedor (PK)
   nombre_proveedor
  direccion
  correo_proveedor
 
**Relación:** Un proveedor puede ofrecer varias marcas. Está relacionado con la tabla “Marca” mediante la clave foránea id_proveedor.
 
**2. Tabla Marca:**
Campos:
id_marca (PK)
id_proveedor (FK)
nombre_marca
país
 
**Relación**: Cada marca pertenece a un proveedor, pero una marca puede estar asociada a muchas prendas. Esta tabla tiene una relación de muchos a uno con la tabla “Proveedor” y de uno a muchos con Prenda.

**3. Tabla Prenda:**
Campos:
id_prenda (PK)
id_marca (FK) 
nombre_prenda
descripcion
color
talla
precio
 
**Relación:** Cada prenda pertenece a una marca, también, cada prenda está asociada a los detalles de ventas, es decir con la tabla “Detalle_venta” y con la tabla “inventario”.
 
**4. Tabla Inventario:**
Campos:
id_inventario (PK)
id_prenda (FK)
id_proveedor (FK)
cant_en_stock.
fecha_de_recibo
 
**Relación:** El inventario está vinculado tanto a las prendas como a los proveedores, mostrando qué cantidad de cada prenda está disponible y quién la suministró.
 
**5. Tabla Cliente:**
Campos:
id_cliente (PK)
nombre_cliente
apellidos_cliente
correo
telefono
direccion
 
**Relación:** Los clientes están relacionados con las ventas finales de la tabla “venta_final”, esto con el fin de identificar quién realizó una compra.

**6. Tabla venta_final:**
Campos:
id_venta_final (PK)
id_cliente (FK)
id_detalle_venta (FK)
fecha_venta_final
total_compra
 
**Relación:** Relaciona un cliente con el detalle de venta, indicando qué y cuánto compró el cliente, es decir es la especificación del pedido del cliente. 

**7. Tabla Detalle_venta:**
Campos:
id_detalle_venta (PK)
id_prenda (FK)
cantidad
 
**Relación:** Relaciona una prenda con la venta final, indicando cuántas unidades de una prenda específica fueron compradas en una venta.

**Relaciones Globales:**

**- Proveedor-Marca-Prenda:** Un proveedor suministra varias marcas, y cada marca tiene varias prendas.

**- Inventario:** Lleva el control de las prendas disponibles, relacionándolas con su proveedor y los detalles de la cantidad.

**- Cliente-Venta Final-Detalle de Venta-Prenda:** Un cliente realiza una compra, que contiene varias prendas. Esto permite registrar las prendas vendidas, la cantidad y los clientes que las compraron.


![image](https://github.com/user-attachments/assets/94f759d6-5594-4245-9dd0-efd740902188)
