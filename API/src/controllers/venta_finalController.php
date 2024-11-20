<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/venta_final.php';


// Clase para tabla "Venta_Final" //
class venta_finalController{
    
//** -- Funcion para obtener todos los registros de la tabla "Venta_final"  -- **//
    public function ObtenerTodos(){
        $modeloventa_final = new venta_final();    // Nombre de la clase relacionada con Venta_final //
        echo json_encode(["Resultado" => $modeloventa_final->getAll()]);
    }

//** -- Funcion para obtener un registro único de la tabla "Venta_final" por medio del ID" -- **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_venta){
        $modeloventa_final = new venta_final();
        echo json_encode(value: ["Resultado" => $modeloventa_final->getById($id_venta)]);
    }

//** -- Funcion para crear un registro en tabla "Venta_Final" -- **//
    
public function crear() {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
        
// Validar que los datos necesarios están presentes
            if (!isset($data['id_venta'],$data['id_cliente'], $data['id_detalle_venta'], $data['fecha_venta_final'], $data['total_venta'])) {
                echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de venta final."]);
            return;
            }
        
// Crear instancia del modelo y llamar al método de inserción
            $modeloVenta = new venta_final();
            $resultado = $modeloVenta->insert(
                $data['id_venta'],
                $data['id_cliente'],
                $data['id_detalle_venta'],
                $data['fecha_venta_final'],
                $data['total_venta']
            );
        
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "Se ingresó datos de una venta final nueva."]);
            } else {
                echo json_encode(["Error" => "No se pudo ingresar los datos de la nueva venta final."]);
            }
        }


//** -- Funcion para actualizar un dato en la tabla "Venta Final" -- **//
public function actualizar($id_venta) {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
            
// Validar que los datos necesarios están presentes
            if (!isset($data['id_cliente'], $data['id_detalle_venta'], $data['fecha_venta_final'], $data['total_venta'])) {
                    echo json_encode(["Error" => "Datos incompletos para actualizar el registro de venta final."]);
                    return;
            }
    
// Crear instancia del modelo y llamar al método de actualización
            $modeloVenta = new venta_final();
            $resultado = $modeloVenta->update(
                $id_venta,
                $data['id_cliente'],
                $data['id_detalle_venta'],
                $data['fecha_venta_final'],
                $data['total_venta']
            );
            
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "La prenda con ID $id_venta fue actualizada exitosamente."]);
            } else {
                echo json_encode(["Error" => "No se pudo actualizar la prenda con ID $id_venta."]);
            }
        }


//** -- Funcion para eliminar un dato nuevo en la tabla "Venta Final" -- **//
public function eliminar($id_venta) {
    $modeloVenta = new venta_final();
    $resultado = $modeloVenta->delete($id_venta);
    
//Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "La prenda con ID $id_venta fue eliminada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo eliminar la prenda con ID $id_venta."]);
        }
    }
}

?>