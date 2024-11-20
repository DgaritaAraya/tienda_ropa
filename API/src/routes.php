<?php

// **-------------------------  Llamada de controllers  -------------------------** //

// --- Cliente --- //
require_once "../src/controllers/clienteController.php";

// --- Detalle_Venta -- //
require_once "../src/controllers/detalle_ventaController.php";

// --- Inventario --- //
require_once "../src/controllers/inventarioController.php";

// --- Marca --- //
require_once "../src/controllers/marcaController.php";

// --- Prenda --- //
require_once "../src/controllers/prendaController.php";

// --- Proveedor --- //
require_once "../src/controllers/proveedorController.php";

// --- Venta_Final--- //
require_once "../src/controllers/venta_finalController.php";

// --- Marca_Con_Ventas -- //
require_once "../src/controllers/marcas_con_ventasController.php";

// --- Prenda_Vendidas_y_en_Stock -- //
require_once "../src/controllers/prendas_vendidas_y_en_stockController.php";

// --- Marcas_Mas_Vendidas -- //
require_once "../src/controllers/marcas_mas_vendidasController.php";


// ENDPOINT PRINCIPAL: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente
// ENDPOINT CON UN PARÁMETRO: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/cliente?id_cliente=304870585

//-- Lógica de la API --//

$method = $_SERVER['REQUEST_METHOD'];

// Remueve "/" del inicio
$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], '/') : '';

// Divide la ruta por "/" para obtener el endpoint y el posible parámetro
$segments = explode('/', $path);

// Captura la cadena de consulta completa después del "?" //
$queryString = $_SERVER['QUERY_STRING'];

// Parsea la cadena de consulta a un arreglo asociativo
parse_str($queryString, $queryParams);


// **-------------------------  ENDPOINTS  -------------------------** //


// 1.

//**                        TABLA CLIENTES                         ** //


//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Cliente" --//

if ($path == "cliente") {
    $clienteController = new clienteController();
    
    switch ($method) {
// --- Leer Datos --- //
        case 'GET':
            $id_cliente = isset($queryParams['id_cliente']) ? $queryParams['id_cliente'] : null;
            
            if ($id_cliente != null) {
                $clienteController->ObtenerPorId($id_cliente);
            } else {
                $clienteController->ObtenerTodos();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $clienteController->crear();
            break;

// --- Actualizar Datos --- //
        case 'PUT':
            // Verificar que se proporcione el ID en la URL
            $id_cliente = isset($queryParams['id_cliente']) ? $queryParams['id_cliente'] : null;
            if ($id_cliente) {
                $clienteController->actualizar($id_cliente);
            } else {
                echo json_encode(["Error" => "ID de prenda requerido para actualizar."]);
            }
            break;

// --- Eliminar Datos --- //
        case 'DELETE':
            $id_cliente = isset($queryParams['id_cliente']) ? $queryParams['id_cliente'] : null;
            if ($id_cliente) {
                $clienteController->eliminar($id_cliente);
            } else {
                echo json_encode(["Error" => "ID del cliente requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para Cliente."]);
    }
}

// 2.

//**                                  TABLA DETALLE_VENTA                                         ** //

//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Detalle_Venta" --//

if ($path == "detalleVenta") {
    $detalle_ventaController = new detalle_ventaController();
    
    switch ($method) {
// --- Leer Datos --- //
        case 'GET':
            $id_detalle_venta = isset($queryParams['id_detalle_venta']) ? $queryParams['id_detalle_venta'] : null;
            
            if ($id_detalle_venta != null) {
                $detalle_ventaController->ObtenerPorId($id_detalle_venta);
            } else {
                $detalle_ventaController->ObtenerTodos();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $detalle_ventaController->crear();
            break;

// --- Actualizar Datos --- //
        case 'PUT':
            // Verificar que se proporcione el ID en la URL
            $id_detalle_venta = isset($queryParams['id_detalle_venta']) ? $queryParams['id_detalle_venta'] : null;
            if ($id_detalle_venta) {
                $detalle_ventaController->actualizar($id_detalle_venta);
            } else {
                echo json_encode(["Error" => "ID de detalle venta requerido para actualizar."]);
            }
            break;

// --- Eliminar Datos --- //
        case 'DELETE':
            $id_detalle_venta = isset($queryParams['id_detalle_venta']) ? $queryParams['id_detalle_venta'] : null;
            if ($id_detalle_venta) {
                $detalle_ventaController->eliminar($id_detalle_venta);
            } else {
                echo json_encode(["Error" => "ID del detalle venta requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para Cliente."]);
    }

}


// 3. 

//**                                  TABLA INVENTARIO                                         ** //

//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Inventario" --//

if ($path == "inventario") {
    $inventarioController = new inventarioController();
    
    switch ($method) {
// --- Leer Datos --- //
        case 'GET':
            $id_inventario = isset($queryParams['id_inventario']) ? $queryParams['id_inventario'] : null;
            
            if ($id_inventario != null) {
                $inventarioController->ObtenerPorId($id_inventario);
            } else {
                $inventarioController->ObtenerTodos();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $inventarioController->crear();
            break;

// --- Actualizar Datos --- //
        case 'PUT':
            // Verificar que se proporcione el ID en la URL
            $id_inventario = isset($queryParams['id_inventario']) ? $queryParams['id_inventario'] : null;
            if ($id_inventario) {
                $inventarioController->actualizar($id_inventario);
            } else {
                echo json_encode(["Error" => "ID de inventario requerido para actualizar."]);
            }
            break;
        
// --- Eliminar Datos --- //
        case 'DELETE':
            $id_inventario = isset($queryParams['id_inventario']) ? $queryParams['id_inventario'] : null;
            if ($id_inventario) {
                $inventarioController->eliminar($id_inventario);
            } else {
                echo json_encode(["Error" => "ID del inventario requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para inventario."]);
    }
}


// 4.

//**                                  TABLA MARCA                                         ** //

//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Marca" --//

if ($path == "marca") {
    $marcaController = new marcaController();

    switch ($method) {
// --- Leer Datos --- //
        case 'GET':
            $id_marca = isset($queryParams['id_marca']) ? $queryParams['id_marca'] : null;
            if ($id_marca != null) {
                $marcaController->ObtenerPorId($id_marca);
            } else {
                $marcaController->ObtenerTodas();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $marcaController->crear();
            break;

// --- Actualizar Datos --- //
        case 'PUT':
            $id_marca = isset($queryParams['id_marca']) ? $queryParams['id_marca'] : null;
            if ($id_marca) {
                $marcaController->actualizar($id_marca);
            } else {
                echo json_encode(["Error" => "ID de marca requerido para actualizar."]);
            }
            break;

// --- Eliminar Datos --- //
        case 'DELETE':
            $id_marca = isset($queryParams['id_marca']) ? $queryParams['id_marca'] : null;
            if ($id_marca) {
                $marcaController->eliminar($id_marca);
            } else {
                echo json_encode(["Error" => "ID de marca requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para Marca."]);
    }
}


// 5.

//**                                  TABLA PRENDA                                         ** //

//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Prenda" --//

if ($path == "prenda") {
    $prendaController = new prendaController();
    
    switch ($method) {
// --- Leer Datos --- //
        case 'GET':
            $id_prenda = isset($queryParams['id_prenda']) ? $queryParams['id_prenda'] : null;
            
            if ($id_prenda != null) {
                $prendaController->ObtenerPorId($id_prenda);
            } else {
                $prendaController->ObtenerTodos();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $prendaController->crear();
            break;

// --- Actualizar Datos --- //
        case 'PUT':
            $id_prenda = isset($queryParams['id_prenda']) ? $queryParams['id_prenda'] : null;
            if ($id_prenda) {
                $prendaController->actualizar($id_prenda);
            } else {
                echo json_encode(["Error" => "ID de prenda requerido para actualizar."]);
            }
            break;

// --- Eliminar Datos --- //
        case 'DELETE':
            $id_prenda = isset($queryParams['id_prenda']) ? $queryParams['id_prenda'] : null;
            if ($id_prenda) {
                $prendaController->eliminar($id_prenda);
            } else {
                echo json_encode(["Error" => "ID de prenda requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para Prenda."]);
    }
}


// 6.

//**                        TABLA PROVEEDOR                                   ** //

//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Proveedor" --//

if ($path == "proveedor") {
    $proveedorController = new proveedorController();
    
    switch ($method) {
        case 'GET':
// --- Leer Datos --- //
            $id_proveedor = isset($queryParams['id_proveedor']) ? $queryParams['id_proveedor'] : null;
            
            if ($id_proveedor != null) {
                $proveedorController->ObtenerPorId($id_proveedor);
            } else {
                $proveedorController->ObtenerTodos();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $proveedorController->crear();
            break;

// --- Actualizar Datos --- //
        case 'PUT':
            // Verificar que se proporcione el ID en la URL
            $id_proveedor = isset($queryParams['id_proveedor']) ? $queryParams['id_proveedor'] : null;
            if ($id_proveedor) {
                $proveedorController->actualizar($id_proveedor);
            } else {
                echo json_encode(["Error" => "ID de proveedor requerido para actualizar."]);
            }
            break;

// --- Eliminar Datos --- //
        case 'DELETE':
            $id_proveedor = isset($queryParams['id_proveedor']) ? $queryParams['id_proveedor'] : null;
            if ($id_proveedor) {
                $proveedorController->eliminar($id_proveedor);
            } else {
                echo json_encode(["Error" => "ID de proveedor requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para proveedor."]);
    }
}


// 7.

//**                                  TABLA VENTA_FINAL                                         ** //

//-- Endpoint para leer, crear, actualizar y eliminar los datos de la  tabla "Venta_Final" --//

if ($path == "ventaFinal") {
    $ventaController = new venta_finalController();
    
    switch ($method) {
        case 'GET':
// --- Leer Datos --- //
            $id_venta = isset($queryParams['id_venta']) ? $queryParams['id_venta'] : null;
            
            if ($id_venta != null) {
                $ventaController->ObtenerPorId($id_venta);
            } else {
                $ventaController->ObtenerTodos();
            }
            break;

// --- Crear Datos --- //
        case 'POST':
            $ventaController->crear();
            break;


// --- Actualizar Datos --- //
        case 'PUT':
            // Verificar que se proporcione el ID en la URL
            $id_venta = isset($queryParams['id_venta']) ? $queryParams['id_venta'] : null;
            if ($id_venta) {
                $ventaController->actualizar($id_venta);
            } else {
                echo json_encode(["Error" => "ID de prenda requerido para actualizar."]);
            }
            break;

// --- Eliminar Datos --- //
        case 'DELETE':
            $id_venta = isset($queryParams['id_venta']) ? $queryParams['id_venta'] : null;
            if ($id_venta) {
                $ventaController->eliminar($id_venta);
            } else {
                echo json_encode(["Error" => "ID del venta final requerido para eliminar."]);
            }
            break;

        default:
            echo json_encode(["Error" => "Método no implementado para Venta final."]);
    }
}


// **-------------------------  ENDPOINTS VISTAS  -------------------------** //


//**                        VISTA MARCA CON VENTAS                         ** //


//-- Listar todas las marcas que tienen al menos una venta --//
// ENDPOINT CON UN PARÁMETRO: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marcas_ventas //


if ($path == "marcas_ventas") {
    $reporteController = new marcas_con_ventasController();

    switch ($method) {
        case 'GET':
            $reporteController->obtenerMarcasConVentas();
            break;
            
        default:
            echo json_encode(["Error" => "Método no implementado para marcas con ventas."]);
    }
}


//**                        VISTA PRENDAS VENDIDAS Y EN STOCK                       ** //


//-- Mostrar las prendas vendidas junto con la cantidad restante en stock --//
// ENDPOINT CON UN PARÁMETRO: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/prendas_vendidas_stock //

if ($path == "prendas_vendidas_stock") {
    $reporteController = new prendas_vendidas_y_en_stockController();

    switch ($method) {
        case 'GET':
            $reporteController->obtenerPrendasVendidasYStock();
            break;
            
        default:
            echo json_encode(["Error" => "Método no implementado para prendas vendidas y stock."]);
    }
}


//**                        VISTA MARCAS MAS VENDIDAS                   ** //


//-- Listar las 5 marcas más vendidas, mostrando la cantidad de ventas de cada una --//
// ENDPOINT CON UN PARÁMETRO: http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php/marcas_mas_vendidas //


if ($path == "marcas_mas_vendidas") {
    $reporteController = new marcas_mas_vendidasController();

    switch ($method) {
        case 'GET':
            $reporteController->obtenerMarcasMasVendidas();
            break;
            
        default:
            echo json_encode(["Error" => "Método no implementado para marcas más vendidas."]);
    }
}

?>