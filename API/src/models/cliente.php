<?php
require_once '../src/db/Database.php';
class cliente {
    private $db;
    public function __construct(){     // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Método para obtener todos los registros de la tabla "Cliente" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            cliente.id_cliente,
            cliente.nombre_cliente,
            cliente.apellidos_cliente,
            cliente.correo,
            cliente.telefono,
            cliente.direccion
        FROM
            cliente
        ");
        return $consulta->fetchAll();
    }

    public function getById($id_cliente){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM cliente WHERE id_cliente = ?"); // El simbolo de pregunta es el parametro //
        
        $consulta->execute(params:[$id_cliente]);
        return $consulta->fetch();
    }

//** -- Método para insertar un nuevo registro en la tabla "Cliente" -- **//
public function insert($id_cliente, $nombre_cliente, $apellidos_cliente, $correo, $telefono, $direccion) {
    $consulta = $this->db->connect()->prepare("
        INSERT INTO cliente (id_cliente, nombre_cliente, apellidos_cliente, correo, telefono, direccion)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    return $consulta->execute([$id_cliente, $nombre_cliente, $apellidos_cliente, $correo, $telefono, $direccion]);
}


//** -- Método para actualizar un nuevo registro en la tabla "Cliente" -- **//
public function update($id_cliente, $nombre_cliente, $apellidos_cliente, $correo, $telefono, $direccion) {
    $consulta = $this->db->connect()->prepare("
        UPDATE cliente 
        SET nombre_cliente = ?, apellidos_cliente = ?, correo = ?, telefono = ?, direccion = ? 
        WHERE id_cliente = ?
    ");
    return $consulta->execute([$nombre_cliente, $apellidos_cliente, $correo, $telefono, $direccion, $id_cliente]);
}


//** -- Método para eliminar un registro de la tabla "Prenda" por ID -- **//
public function delete($id_cliente) {
    $consulta = $this->db->connect()->prepare("DELETE FROM cliente WHERE id_cliente = ?");
        return $consulta->execute([$id_cliente]);
    }
}


?>