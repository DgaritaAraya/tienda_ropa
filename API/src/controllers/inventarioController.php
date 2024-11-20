<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/inventario.php';


// Clase para tabla "Inventario" //
class inventarioController{
    
//** -- Funcion para obtener todos los registros de la tabla "Inventario"  -- **//
    public function ObtenerTodos(){
        $modeloinventario = new inventario();    // Nombre de la clase relacionada con Inventario //
        echo json_encode(["Resultado" => $modeloinventario->getAll()]);
    }

//** -- Funcion para obtener un registro único de la tabla "Inventario" por medio del ID" -- **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_inventario){
        $modeloinventario = new inventario();
        echo json_encode(value: ["Resultado" => $modeloinventario->getById($id_inventario)]);
    }

//** -- Funcion para crear un registro en tabla "Inventario " -- **//
    
public function crear() {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
        
// Validar que los datos necesarios están presentes
            if (!isset($data['id_inventario'],$data['id_prenda'], $data['id_proveedor'], $data['cant_en_stock'], $data['fecha_de_recibo'])) {
                echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de inventario."]);
            return;
            }
        
// Crear instancia del modelo y llamar al método de inserción
            $modeloinventario = new inventario();
            $resultado = $modeloinventario->insert(
                $data['id_inventario'],
                $data['id_prenda'],
                $data['id_proveedor'],
                $data['cant_en_stock'],
                $data['fecha_de_recibo']
            );
        
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "Se ingresó datos de un inventario nuevo."]);
            } else {
                echo json_encode(["Error" => "No se pudo ingresar los datos del nuevo inventario."]);
            }
        }

//** -- Funcion para actualizar un dato en la tabla "Inventario"  -- **//
public function actualizar($id_inventario) {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
            
// Validar que los datos necesarios están presentes
            if (!isset($data['id_prenda'], $data['id_proveedor'], $data['cant_en_stock'], $data['fecha_de_recibo'])) {
                    echo json_encode(["Error" => "Datos incompletos para actualizar el registro de inventario."]);
                    return;
            }
    
// Crear instancia del modelo y llamar al método de actualización 
            $modeloinventario = new inventario();
            $resultado = $modeloinventario->update(
                $id_inventario,
                $data['id_prenda'],
                $data['id_proveedor'],
                $data['cant_en_stock'],
                $data['fecha_de_recibo']
            );
            
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "La prenda con ID $id_inventario fue actualizada exitosamente."]);
            } else {
                echo json_encode(["Error" => "No se pudo actualizar la prenda con ID $id_inventario."]);
            }
        }

//** -- Funcion para eliminar un dato nuevo en la tabla "Inventario" -- **//
public function eliminar($id_inventario) {
            $modeloinventario = new inventario();
            $resultado = $modeloinventario->delete($id_inventario);
    
//Respuesta
    if ($resultado) {
            echo json_encode(["Mensaje" => "La prenda con ID $id_inventario fue eliminada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo eliminar la prenda con ID $id_inventario."]);
        }
    }
    
}

?>