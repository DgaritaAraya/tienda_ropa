<?php
require_once '../src/db/Database.php';

class marca {
    private $db;
    public function __construct(){   // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Método para obtener todos los registros de la tabla "Marca" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            marca.id_marca,
            marca.nombre_cliente,
            marca.pais
        FROM
            mnarca
        ");
        return $consulta->fetchAll();
    }

    public function getById($id_marca){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM marca WHERE id_marca = ?"); // El simbolo de pregunta es el parametro //
        
        $consulta->execute(params:[$id_marca]);
        return $consulta->fetch();
    }

//** -- Método para insertar un nuevo registro en la tabla "Marca" -- **//
    public function insert($id_marca, $nombre_marca, $pais_origen) {
        $consulta = $this->db->connect()->prepare("INSERT INTO marca (id_marca, nombre_marca, pais) VALUES (?, ?, ?)");
        return $consulta->execute([$id_marca, $nombre_marca, $pais_origen]);
    }

//** -- Método para actualizar un nuevo registro en la tabla "Marca" -- **//
    public function update($id_marca, $nombre_marca, $pais_origen) {
        $consulta = $this->db->connect()->prepare("UPDATE marca SET nombre_marca = ?, pais = ? WHERE id_marca = ?");
        return $consulta->execute([$nombre_marca, $pais_origen, $id_marca]);
    }

//** -- Método para eliminar un registro de la tabla "Marca" por ID -- **//
    public function delete($id_marca) {
        $consulta = $this->db->connect()->prepare("DELETE FROM marca WHERE id_marca = ?");
        return $consulta->execute([$id_marca]); 
    }
}

?>




