<?php
require_once '../src/db/Database.php';

class marcas_con_ventas {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

//** -- Método para obtener todas las marcas con al menos una venta -- **//
    public function obtenerMarcasConVentas() {
        $consulta = $this->db->connect()->query("SELECT nombre_marca FROM marcas_con_ventas");
        return $consulta->fetchAll();
    }
}
?>

