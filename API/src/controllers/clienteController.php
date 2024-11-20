<?php
//Pide la informacion que "models" toma de la base de datos//
require_once '../src/models/cliente.php';


// Clase para tabla "Cliente" //
class clienteController{
    
//** -- Funcion para obtener todos los registros de la tabla "Cliente"  -- **//
    public function ObtenerTodos(){
        $modelocliente = new cliente();    // Nombre de la clase relacionada con cliente //
        echo json_encode(["Resultado" => $modelocliente->getAll()]);
    }

//** */ Funcion para obtener los registros o un registro único de la tabla "Cliente" por medio del ID"  **//
    /**
     * 
     * @param int 
     *
     * @return void
     */

    public function ObtenerPorId($id_cliente){
        $modelocliente = new cliente();
        echo json_encode(value: ["Resultado" => $modelocliente->getById($id_cliente)]);
    }

//** -- Funcion para crear un dato nuevo en la tabla "Cliente"  -- **//

    public function crear() {
// Obtener los datos enviados en el cuerpo de la solicitud
        $data = json_decode(file_get_contents("php://input"), true);
        
// Validar que los datos necesarios están presentes
        if (!isset($data['id_cliente'], $data['nombre_cliente'], $data['apellidos_cliente'], $data['correo'], $data['telefono'], $data['direccion'])) {
            echo json_encode(["Error" => "Datos incompletos para crear un nuevo registro de cliente."]);
            return;
        }
        
// Crear instancia del modelo y llamar al método de inserción
    $modelocliente = new cliente();
    $resultado = $modelocliente->insert(
        $data['id_cliente'],
        $data['nombre_cliente'],
        $data['apellidos_cliente'],  
        $data['correo'],
        $data['telefono'],
        $data['direccion']
    );
        
// Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "Se ingresó datos de un cliente nuevo."]);
            } else {
                echo json_encode(["Error" => "No se pudo ingresar los datos del nuevo cliente."]);
            }
        }
        

//** -- Funcion para actualizar un dato en la tabla "Cliente" -- **//
    public function actualizar($id_cliente) {
    
// Obtener los datos enviados en el cuerpo de la solicitud
        $data = json_decode(file_get_contents("php://input"), true);
    
// Validar que los datos necesarios están presentes
        if (!isset($data['nombre_cliente'], $data['apellidos_cliente'], $data['correo'], $data['telefono'], $data['direccion'])) {
            echo json_encode(["Error" => "Datos incompletos para actualizar el registro de cliente."]);
            return;
        }
    
// Crear instancia del modelo y llamar al método de actualización //
        $modelocliente = new cliente();
        $resultado = $modelocliente->update(
            $id_cliente,
            $data['nombre_cliente'],
            $data['apellidos_cliente'],
            $data['correo'],
            $data['telefono'],
            $data['direccion']
        );
    
// Respuesta
        if ($resultado) {
            echo json_encode(["Mensaje" => "El cliente con ID $id_cliente fue actualizado exitosamente."]);
        } else {
            echo json_encode(["Error" => "No se pudo actualizar el cliente con ID $id_cliente."]);
        }
    }
    
//** -- Funcion para eliminar un dato nuevo en la tabla "Cliente" -- **//
        public function eliminar($id_cliente) {
            $modelocliente = new cliente();
            $resultado = $modelocliente->delete($id_cliente);

//Respuesta
            if ($resultado) {
                echo json_encode(["Mensaje" => "El cliente con ID $id_cliente fue eliminada exitosamente."]);
            } else {
                echo json_encode(["Error" => "No se pudo eliminar el cliente con ID $id_cliente."]);
            }
        }
}

?>