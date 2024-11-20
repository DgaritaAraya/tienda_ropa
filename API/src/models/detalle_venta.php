<?php
require_once '../src/db/Database.php';
class detalle_venta{
    private $db;
    public function __construct(){     // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Método para obtener todos los registros de la tabla "Detalle_Venta" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            detalle_venta.id_detalle_venta,
            detalle_venta.id_prenda,
            detalle_venta.cantidad
        FROM
            detalle_venta
        ");
        return $consulta->fetchAll();
    }

//** -- Método para obtener los datos Detalle_Venta por ID -- **// 
    public function getById($id_detalle_venta){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM detalle_venta WHERE id_detalle_venta = ?"); // El simbolo de pregunta es el parametro //
        
        $consulta->execute(params:[$id_detalle_venta]);
        return $consulta->fetch();
    }
//** -- Método para insertar un nuevo registro en la tabla "Detalle_Venta" -- **//
public function insert($id_detalle_venta, $id_prenda, $cantidad) {
    $consulta = $this->db->connect()->prepare("
        INSERT INTO detalle_venta (id_detalle_venta, id_prenda, cantidad)
        VALUES (?, ?, ?)
    ");
    return $consulta->execute([$id_detalle_venta, $id_prenda, $cantidad]);
}

//** -- Método para Actualizar un nuevo registro en la tabla "Detalle_Venta" -- **//
public function update($id_detalle_venta, $id_prenda, $cantidad) {
    $consulta = $this->db->connect()->prepare("
        UPDATE detalle_venta 
        SET id_prenda = ?, cantidad = ?
        WHERE id_detalle_venta = ?
    ");
    return $consulta->execute([$id_prenda, $cantidad, $id_detalle_venta]);
}


// Método para eliminar un registro de la tabla "Detalle_Venta" por ID //
    public function delete($id_detalle_venta) {
        $consulta = $this->db->connect()->prepare("DELETE FROM detalle_venta WHERE id_detalle_venta = ?");
        return $consulta->execute([$id_detalle_venta]);
    }
}


?>
