<?php
require_once '../src/db/Database.php';
class proveedor {
    private $db;
    public function __construct(){     // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Método para obtener todos los registros de la tabla "Proveedor" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            proveedor.id_proveedor,
            proveedor.nombre_proveedor,
            proveedor.direccion,
            proveedor.correo_proveedor
        FROM
            proveedor
        ");
        return $consulta->fetchAll();
    }


//** -- Método para obtener un registro de la tabla "Proveedor" por ID -- **//
    public function getById($id_proveedor){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM proveedor WHERE id_proveedor = ?"); // El simbolo de pregunta es el parametro //
        
        $consulta->execute(params:[$id_proveedor]);
        return $consulta->fetch();
    }

//** -- Método para insertar un nuevo registro en la tabla "Proveedor" -- **//
    public function insert($id_proveedor, $nombre_proveedor, $direccion, $correo_proveedor) {
        $consulta = $this->db->connect()->prepare("
            INSERT INTO proveedor (id_proveedor, nombre_proveedor, direccion, correo_proveedor)
            VALUES (?, ?, ?, ?)
        ");
        return $consulta->execute([$id_proveedor, $nombre_proveedor, $direccion, $correo_proveedor]);
    }

//** -- Método para actualizar un nuevo registro en la tabla "Proveedor" -- **//
    public function update($id_proveedor, $nombre_proveedor, $direccion, $correo_proveedor) {
        $consulta = $this->db->connect()->prepare("
            UPDATE proveedor 
            SET nombre_proveedor = ?, direccion = ?, correo_proveedor = ? 
            WHERE id_proveedor = ?
        ");
        return $consulta->execute([ $nombre_proveedor, $direccion, $correo_proveedor, $id_proveedor]);
}

//** -- Método para eliminar un registro de la tabla "Proveedor" por ID -- **//
    public function delete($id_proveedor) {
        $consulta = $this->db->connect()->prepare("DELETE FROM proveedor WHERE id_proveedor = ?");
        return $consulta->execute([$id_proveedor]);
    }
}

?>