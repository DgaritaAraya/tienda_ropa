<?php
require_once '../src/db/Database.php';

class prendas_vendidas_y_en_stock {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

//** -- Método para obtener todas las prendas vendidas y su stock actual -- **//
    public function obtenerPrendasVendidasYStock() {
        $consulta = $this->db->connect()->query("SELECT nombre_prenda, venta_total, restante_en_stock, cant_anterior_en_stock FROM Prendas_Vendidas_Y_En_Stock");
        return $consulta->fetchAll();
    }
}
?>
