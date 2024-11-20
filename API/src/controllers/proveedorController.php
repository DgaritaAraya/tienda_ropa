<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/proveedor.php';


// Clase para tabla "Proveedor" //
class proveedorController{
    
//** -- Funcion para obtener todos los registros de la tabla "Proveedor" -- **//
    public function ObtenerTodos(){
        $modeloproveedor = new proveedor();    // Nombre de la clase relacionada con Proveedor //
        echo json_encode(["Resultado" => $modeloproveedor->getAll()]);
    }

//** -- Funcion para obtener un registro único de la tabla "Proveedor" por medio del ID"  -- **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_proveedor){
        $modeloproveedor = new proveedor();
        echo json_encode(value: ["Resultado" => $modeloproveedor->getById($id_proveedor)]);
    }

//** -- Funcion para crear un dato nuevo en la tabla "Proveedor" -- **//
    public function crear() {
// Obtener los datos enviados en el cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);
        
// Validar que los datos necesarios están presentes
            if (!isset($data['id_proveedor'],$data['nombre_proveedor'], $data['direccion'], $data['correo_proveedor'])) {
                echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de proveedor."]);
            return;
            }
        
// Crear instancia del modelo y llamar al método de inserción
            $modeloproveedor = new proveedor();
            $resultado = $modeloproveedor->insert(
                $data['id_proveedor'],
                $data['nombre_proveedor'],
                $data['direccion'],
                $data['correo_proveedor']
            );
        
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "Se ingresó datos de un proveedor nuevo."]);
            } else {
                echo json_encode(["Error" => "No se pudo ingresar los datos del nuevo proveedor."]);
            }
        }

//** -- Funcion para actualizar un dato en la tabla "Proveedor"  -- **//
    public function actualizar($id_proveedor) {
// Obtener los datos enviados en el cuerpo de la solicitud
                $data = json_decode(file_get_contents("php://input"), true);
                
// Validar que los datos necesarios están presentes
                if (!isset($data['nombre_proveedor'], $data['direccion'], $data['correo_proveedor'])) {
                        echo json_encode(["Error" => "Datos incompletos para actualizar el registro de proveedor."]);
                        return;
                }
        
// Crear instancia del modelo y llamar al método de actualización
                $modeloproveedor = new proveedor();
                $resultado = $modeloproveedor->update(
                    $id_proveedor,
                    $data['nombre_proveedor'],
                    $data['direccion'],
                    $data['correo_proveedor']
                );
                
// Respuesta
                if ($resultado) {
                    echo json_encode(["Mensaje" => "La prenda con ID $id_proveedor fue actualizada exitosamente."]);
                } else {
                    echo json_encode(["Error" => "No se pudo actualizar la prenda con ID $id_proveedor."]);
                }
            }

//** -- Funcion para eliminar un dato nuevo en la tabla "Proveedor "  --**//
    public function eliminar($id_proveedor) {
        $modeloproveedor = new proveedor();
        $resultado = $modeloproveedor->delete($id_proveedor);
        
//Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "La prenda con ID $id_proveedor fue eliminada exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo eliminar la prenda con ID $id_proveedor."]);
        }
    }
}

?>
