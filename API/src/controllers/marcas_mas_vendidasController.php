<?php
require_once '../src/models/marcas_mas_vendidas.php';

class marcas_mas_vendidasController {

//** -- Función para obtener las marcas más vendidas --**//
    public function obtenerMarcasMasVendidas() {
        $modeloReporte = new marcas_mas_vendidas();
        $resultado = $modeloReporte->obtenerMarcasMasVendidas();
        
// Verifica si hay resultados y responde
        if ($resultado) {
            echo json_encode(["Resultado" => $resultado]);
        } else {
            echo json_encode(["Error" => "No se encontraron marcas con ventas."]);
        }
    }
}
?>
