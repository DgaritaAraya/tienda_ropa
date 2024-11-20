<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/marca.php';

// Clase para tabla "Marca" //
class marcaController {

//** --Funcion para obtener todos los registros de la tabla "Marca"  -- **//
    public function ObtenerTodas() {
        $modelomarca = new marca();
        echo json_encode(["Resultado" => $modelomarca->getAll()]);
    }

//** -- Funcion para obtener un registro único de la tabla "Marca" por medio del ID" -- **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_marca) {
        $modelomarca = new marca();
        echo json_encode(["Resultado" => $modelomarca->getById($id_marca)]);
    }

//** --Funcion para crear un registro en tabla "Marca" -- **//
    public function crear() {
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($data['id_marca'], $data['id_proveedor'], $data['nombre_marca'], $data['pais'])) {
            echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de marca."]);
            return;
        }

        $modelomarca = new marca();
        $resultado = $modelomarca->insert(
            $data['id_marca'],
            $data['id_proveedor'],
            $data['nombre_marca'],
            $data['pais']
        );

        if ($resultado) {
            echo json_encode(["Mensaje" => "Se ingresó una nueva marca."]);
        } else {
            echo json_encode(["Error" => "No se pudo ingresar la nueva marca."]);
        }
    }

//** -- Funcion para actualizar un dato en la tabla "Marca" -- **//
    public function actualizar($id_marca) {
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($data['nombre_marca'], $data['pais'])) {
            echo json_encode(["Error" => "Datos incompletos para actualizar la marca."]);
            return;
        }

        $modelomarca = new marca();
        $resultado = $modelomarca->update(
            $id_marca,
            $data['id_proveedor'],
            $data['nombre_marca'],
            $data['pais']
        );

        if ($resultado) {
            echo json_encode(["Mensaje" => "La marca con ID $id_marca fue actualizada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo actualizar la marca con ID $id_marca."]);
        }
    }

//** -- Funcion para eliminar un dato nuevo en la tabla "Marca" -- **//

    public function eliminar($id_marca) {
        $modelomarca = new marca();
        $resultado = $modelomarca->delete($id_marca);

        if ($resultado) {
            echo json_encode(["Mensaje" => "La marca con ID $id_marca fue eliminada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo eliminar la marca con ID $id_marca."]);
        }
    }
}

?>
