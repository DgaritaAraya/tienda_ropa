<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/detalle_venta.php';


// Clase para tabla "Detalle_Venta" //
class detalle_ventaController{
    
//** -- Funcion para obtener todos los registros de la tabla "Detalle_Venta" -- **//
    public function ObtenerTodos(){
        $modelodetalle_venta = new detalle_venta();    // Nombre de la clase relacionada con Detalle Venta //
        echo json_encode(["Resultado" => $modelodetalle_venta->getAll()]);
    }

//** -- Funcion para obtener un registro único de la tabla "Detalle Venta" por medio del ID"  -- **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_detalle_venta){
        $modelodetalle_venta = new detalle_venta();
        echo json_encode(value: ["Resultado" => $modelodetalle_venta->getById($id_detalle_venta)]);
    }

//** --Funcion para crear un registro en tabla "Detalle Venta"  -- **//
    
public function crear() {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
        
// Validar que los datos necesarios están presentes
            if (!isset($data['id_detalle_venta'],$data['id_prenda'], $data['cantidad'])) {
                echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de Detalle venta."]);
            return;
            }
        
// Crear instancia del modelo y llamar al método de inserción
            $modelodetalle_venta = new detalle_venta();
            $resultado = $modelodetalle_venta->insert(
                $data['id_detalle_venta'],
                $data['id_prenda'],
                $data['cantidad']
            );
        
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "Se ingresó datos de un detalle de venta nuevo."]);
            } else {
                echo json_encode(["Error" => "No se pudo ingresar los datos de un nuevo detalle de venta."]);
            }
        }

//** --Funcion para actualizar un dato en la tabla "detalle_venta" -- **//
public function actualizar($id_detalle_venta) {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
            
// Validar que los datos necesarios están presentes
            if (!isset($data['id_prenda'], $data['cantidad'])) {
                    echo json_encode(["Error" => "Datos incompletos para actualizar el registro de detalle venta."]);
                    return;
            }
    
// Crear instancia del modelo y llamar al método de actualización
            $modelodetalle_venta = new detalle_venta();
            $resultado = $modelodetalle_venta->update(
                $id_detalle_venta,
                $data['id_prenda'],
                $data['cantidad']
            );
            
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "La prenda con ID $id_detalle_venta fue actualizada exitosamente."]);
            } else {
                echo json_encode(["Error" => "No se pudo actualizar la prenda con ID $id_detalle_venta."]);
            }
        }

//** -- Funcion para eliminar un dato nuevo en la tabla "detalle_venta" -- **//
public function eliminar($id_detalle_venta) {
    $modelodetalle_venta = new detalle_venta();
    $resultado = $modelodetalle_venta->delete($id_detalle_venta);
    
//Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "La prenda con ID $id_detalle_venta fue eliminada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo eliminar la prenda con ID $id_detalle_venta."]);
        }
    }
}

?>