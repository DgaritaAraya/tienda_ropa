<?php
require_once '../src/db/Database.php';
class prenda {
    private $db;
    public function __construct(){     // Este constructor se ejecuta automaticamente, para crear la coneccion //
        $this->db = new Database();
    }

//** -- Función para obtener todos los registros de la tabla "Prenda" -- **//
    public function getAll(){

        $consulta = $this->db->connect()->query("
        SELECT 
            prenda.id_prenda,
            prenda.id_marca,
            prenda.nombre_prenda,
            prenda.descripcion,
            prenda.color,
            prenda.talla,
            prenda.precio
        FROM
            prenda
        ");
        return $consulta->fetchAll();
    }

    public function getById($id_prenda){
        $consulta = $this->db->connect()->prepare(
            "SELECT * FROM prenda WHERE id_prenda = ?"); // El simbolo de pregunta es el parametro //
        
        $consulta->execute(params:[$id_prenda]);
        return $consulta->fetch();
    }


//** -- Método para insertar un nuevo registro en la tabla "Prenda" -- **//
    public function insert($id_prenda, $id_marca, $nombre_prenda, $descripcion, $color, $talla, $precio) {
        $consulta = $this->db->connect()->prepare("
            INSERT INTO prenda (id_prenda, id_marca, nombre_prenda, descripcion, color, talla, precio)
            VALUES (?, ?, ?, ?, ?, ?,?)
        ");
        return $consulta->execute([$id_prenda,$id_marca, $nombre_prenda, $descripcion, $color, $talla, $precio]);
    }

//** -- Método para insertar un nuevo registro en la tabla "Prenda" -- **//
    public function update($id_prenda, $id_marca, $nombre_prenda, $descripcion, $color, $talla, $precio) {
        $consulta = $this->db->connect()->prepare("
            UPDATE prenda 
            SET id_marca = ?, nombre_prenda = ?, descripcion = ?, color = ?, talla = ?, precio = ? 
            WHERE id_prenda = ?
        ");
        return $consulta->execute([$id_marca, $nombre_prenda, $descripcion, $color, $talla, $precio, $id_prenda]);
    }
    

//** -- Método para eliminar un registro de la tabla "Prenda" por ID -- **//
    public function delete($id_prenda) {
        $consulta = $this->db->connect()->prepare("DELETE FROM prenda WHERE id_prenda = ?");
        return $consulta->execute([$id_prenda]);
    }
}


?>
