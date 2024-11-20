<?php
require_once '../src/db/Database.php';
class venta_final{
    private $db;
    public function __construct(){     // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Método para obtener todos los registros de la tabla "Venta_final" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            venta_final.id_venta,
            venta_final.id_cliente,
            venta_final.id_detalle_venta,
            venta_final.fecha_venta_final,
            venta_final.total_venta
        FROM
            venta_final
        ");
        return $consulta->fetchAll();
    }


//** -- Método para obtener un registro de la tabla "Venta_Final" por ID -- **//
    public function getById($id_venta){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM venta_final WHERE id_venta = ?"); // El simbolo de pregunta es el parametro -- **//
        
        $consulta->execute(params:[$id_venta]);
        return $consulta->fetch();
    }

//** -- Método para insertar un nuevo registro en la tabla "Venta_Final" -- **//
    public function insert($id_venta, $id_cliente, $id_detalle_venta, $fecha_venta_final, $total_venta) {
        $consulta = $this->db->connect()->prepare("
            INSERT INTO venta_final (id_venta, id_cliente, id_detalle_venta, fecha_venta_final, total_venta)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $consulta->execute([$id_venta, $id_cliente, $id_detalle_venta, $fecha_venta_final, $total_venta]);
    }

//** -- Método para actualizar un nuevo registro en la tabla "Venta_Final" //
    public function update($id_venta, $id_cliente, $id_detalle_venta, $fecha_venta_final, $total_venta) {
        $consulta = $this->db->connect()->prepare("
            UPDATE venta_final 
            SET id_cliente = ?, id_detalle_venta = ?, fecha_venta_final = ?, total_venta = ?
            WHERE id_venta = ?
        ");
        return $consulta->execute([$id_cliente, $id_detalle_venta, $fecha_venta_final, $total_venta, $id_venta]);
    }

//** -- Método para eliminar un registro de la tabla "Venta_Final" por ID  -- **//
    public function delete($id_venta) {
        $consulta = $this->db->connect()->prepare("DELETE FROM venta_final WHERE id_venta = ?");
        return $consulta->execute([$id_venta]);
    }
}

?>