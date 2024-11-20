<?php
require_once '../src/models/marcas_con_ventas.php';

class marcas_con_ventasController {

//** -- Función para obtener todas las marcas con al menos una venta -- **//
    public function obtenerMarcasConVentas() {
        $modeloReporte = new marcas_con_ventas();
        $resultado = $modeloReporte->obtenerMarcasConVentas();
        
// Verifica si hay resultados y responde //
        if ($resultado) {
            echo json_encode(["Resultado" => $resultado]);
        } else {
            echo json_encode(["Error" => "No se encontraron marcas con ventas."]);
        }
    }
}
?>
