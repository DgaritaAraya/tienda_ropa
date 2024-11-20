<?php
require_once '../src/db/Database.php';

class marcas_mas_vendidas {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

//** --  Método para obtener las marcas más vendidas -- **//
    public function obtenerMarcasMasVendidas() {
        $consulta = $this->db->connect()->query("SELECT nombre_marca, total_ventas FROM Marcas_Mas_Vendidas");
        return $consulta->fetchAll();
    }
}
?>
