<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/prenda.php';


// Clase para tabla "Prenda" //
class prendaController{
    
//** -- Funcion para obtener todos los registros de la tabla "Prenda"  -- **//
    public function ObtenerTodos(){
        $modeloprenda = new prenda();    // Nombre de la clase relacionada con Prenda //
        echo json_encode(["Resultado" => $modeloprenda->getAll()]);
    }

//** -- Funcion para obtener un registro único de la tabla "Prenda" por medio del ID"  -- **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_prenda){
        $modeloprenda = new prenda();
        echo json_encode(value: ["Resultado" => $modeloprenda->getById($id_prenda)]);
    }

//** -- Funcion para crear un dato nuevo en la tabla "Prenda"  -- **//

    public function crear() {
// Obtener los datos enviados en el cuerpo de la solicitud
        $data = json_decode(file_get_contents("php://input"), true);
    
// Validar que los datos necesarios están presentes
        if (!isset($data['id_prenda'],$data['id_marca'], $data['nombre_prenda'], $data['descripcion'], $data['color'], $data['talla'], $data['precio'])) {
            echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de prenda."]);
        return;
        }
    
// Crear instancia del modelo y llamar al método de inserción
        $modeloprenda = new prenda();
        $resultado = $modeloprenda->insert(
            $data['id_prenda'],
            $data['id_marca'],
            $data['nombre_prenda'],
            $data['descripcion'],
            $data['color'],
            $data['talla'],
            $data['precio']
        );
    
// Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "Se ingresó datos de una prenda nueva."]);
        } else {
            echo json_encode(["Error" => "No se pudo ingresar los datos de la nueva prenda."]);
        }
    }


//** -- Funcion para actualizar un dato en la tabla "Prenda"  -- **//
    public function actualizar($id_prenda) {
// Obtener los datos enviados en el cuerpo de la solicitud
        $data = json_decode(file_get_contents("php://input"), true);
        
// Validar que los datos necesarios están presentes
        if (!isset($data['id_marca'], $data['nombre_prenda'], $data['descripcion'], $data['color'], $data['talla'], $data['precio'])) {
                echo json_encode(["Error" => "Datos incompletos para actualizar el registro de prenda."]);
                return;
        }

// Crear instancia del modelo y llamar al método de actualización
        $modeloprenda = new prenda();
        $resultado = $modeloprenda->update(
            $id_prenda,
            $data['id_marca'],
            $data['nombre_prenda'],
            $data['descripcion'],
            $data['color'],
            $data['talla'],
            $data['precio']
        );
        
// Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "La prenda con ID $id_prenda fue actualizada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo actualizar la prenda con ID $id_prenda."]);
        }
    }


//** -- Funcion para eliminar un dato nuevo en la tabla "Prenda"  --**//
    public function eliminar($id_prenda) {
        $modeloprenda = new prenda();
        $resultado = $modeloprenda->delete($id_prenda);
        
//Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "La prenda con ID $id_prenda fue eliminada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo eliminar la prenda con ID $id_prenda."]);
        }
    }
}

?>