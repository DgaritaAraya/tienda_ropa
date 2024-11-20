<?php
require_once '../src/db/Database.php';
class inventario {
    private $db;
    public function __construct(){     // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Método para obtener todos los registros de la tabla "Inventario" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            inventario.id_inventario,
            inventario.id_prenda,
            inventario.id_proveedor,
            inventario.cant_en_stock,
            inventario.fecha_de_recibo
        FROM
            inventario
        ");
        return $consulta->fetchAll();
    }

//** -- Método para obtener un registro de la tabla "Inventario" por ID -- **//
    public function getById($id_inventario){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM inventario WHERE id_inventario = ?"); // El simbolo de pregunta es el parametro //
        
        $consulta->execute(params:[$id_inventario]);
        return $consulta->fetch();
    }

//** -- Método para insertar un nuevo registro en la tabla "Inventario" -- **//
    public function insert($id_inventario, $id_prenda, $id_proveedor, $cant_en_stock, $fecha_de_recibo) {
        $consulta = $this->db->connect()->prepare("
            INSERT INTO inventario (id_inventario, id_prenda, id_proveedor, cant_en_stock, fecha_de_recibo)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $consulta->execute([$id_inventario, $id_prenda, $id_proveedor, $cant_en_stock, $fecha_de_recibo]);
    }

//** -- Método para Actualizar un nuevo registro en la tabla "Inventario" -- **//
    public function update($id_inventario, $id_prenda, $id_proveedor, $cant_en_stock, $fecha_de_recibo) {
        $consulta = $this->db->connect()->prepare("
            UPDATE inventario 
            SET id_prenda = ?, id_proveedor = ?, cant_en_stock = ?, fecha_de_recibo = ? 
            WHERE id_inventario = ?
        ");
        return $consulta->execute([$id_prenda, $id_proveedor, $cant_en_stock, $fecha_de_recibo, $id_inventario]);
    }

//** -- Método para eliminar un registro de la tabla "Prenda" por ID -- **//
    public function delete($id_inventario) {
        $consulta = $this->db->connect()->prepare("DELETE FROM inventario WHERE id_inventario = ?");
        return $consulta->execute([$id_inventario]);
    }
}

?>