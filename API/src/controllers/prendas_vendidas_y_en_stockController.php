<?php
require_once '../src/models/prendas_vendidas_y_en_stock.php';

class prendas_vendidas_y_en_stockController {

//** -- Función para obtener todas las prendas vendidas y su stock actual --**//
    public function obtenerPrendasVendidasYStock() {
        $modeloReporte = new prendas_vendidas_y_en_stock();
        $resultado = $modeloReporte->obtenerPrendasVendidasYStock();
        
// Verifica si hay resultados y responde
        if ($resultado) {
            echo json_encode(["Resultado" => $resultado]);
        } else {
            echo json_encode(["Error" => "No se encontraron prendas vendidas con datos de stock."]);
        }
    }
}
?>
