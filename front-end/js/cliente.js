const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Función para obtener todos los datos de la tabla Cliente
function obtenerTodosLosClientes() {
    const xhr = new XMLHttpRequest();
 
    // Solicitar datos al servidor
    xhr.open('GET', API_URL + '/cliente', true);
 
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
 
            try {
                const response = JSON.parse(cleanedText);
                if (response.Resultado && Array.isArray(response.Resultado)) {
                    const clientes = response.Resultado;
 
                    // Limpiar la tabla antes de agregar nuevos datos
                    const tbody = document.querySelector('#cliente-table tbody');
                    tbody.innerHTML = '';
 
                    // Iterar sobre los clientes y agregarlos a la tabla
                    clientes.forEach(cliente => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${cliente.id_cliente}</td>
                            <td>${cliente.nombre_cliente}</td>
                            <td>${cliente.apellidos_cliente}</td>
                            <td>${cliente.correo}</td>
                            <td>${cliente.telefono}</td>
                            <td>${cliente.direccion}</td>
                            <td>
                                <button onclick="mostrarFormActualizarCliente(${cliente.id_cliente}, '${cliente.nombre_cliente}', '${cliente.apellidos_cliente}', '${cliente.correo}', '${cliente.telefono}', '${cliente.direccion}')">Actualizar</button>
                                <button onclick="eliminarCliente(${cliente.id_cliente})">Eliminar</button>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    console.error("Formato de respuesta inesperado:", response);
                }
            } catch (e) {
                console.error('Error al analizar JSON:', e);
            }
        } else {
            console.error('Error al obtener clientes:', this.statusText);
        }
    };
 
    xhr.onerror = function () {
        console.error('Error en la solicitud');
    };
 
    xhr.send();
}
 
// Función para guardar un nuevo cliente
function guardarCliente(data) {
    console.log("Guardar dato nuevo en la tabla cliente");
    console.log(data);
 
    const xhr = new XMLHttpRequest();
    xhr.open('POST', API_URL + '/cliente', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
 
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('Cliente guardado exitosamente');
            obtenerTodosLosClientes();
        } else {
            console.error('Error al guardar el cliente:', xhr.statusText);
        }
    };
 
    xhr.onerror = function () {
        console.error('Error en la solicitud');
    };
 
    xhr.send(JSON.stringify(data));
}
 
// Función para actualizar un cliente existente
function actualizarCliente(data) {
    console.log("Actualizar cliente:")
    console.log(data);
   
    const xhr = new XMLHttpRequest();
    xhr.open('PUT', API_URL + '/cliente/' + data.id_cliente, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
 
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('Cliente actualizado exitosamente');
            obtenerTodosLosClientes();
        } else {
            console.error('Error al actualizar el cliente:', xhr.statusText);
        }
    };
 
    xhr.onerror = function () {
        console.error('Error en la solicitud');
    };
 
    xhr.send(JSON.stringify(data));
}
 
// Función para mostrar el formulario de actualización con datos cargados
function mostrarFormActualizarCliente(id_cliente, nombre_cliente, apellidos_cliente, correo, telefono, direccion) {
    const form = document.getElementById('update-cliente-form');
    form.querySelector('#update-id').value = id_cliente;
    form.querySelector('#update-nombre').value = nombre_cliente;
    form.querySelector('#update-apellidos').value = apellidos_cliente;
    form.querySelector('#update-correo').value = correo;
    form.querySelector('#update-telefono').value = telefono;
    form.querySelector('#update-direccion').value = direccion;
    form.style.display = 'block'; // Mostrar el formulario
}
 
// Función para eliminar un cliente //
// Función para eliminar un cliente //
function eliminarCliente(id_cliente) {
    if (!id_cliente || isNaN(id_cliente)) {
        alert('El ID del cliente no es válido.');
        return;
    }
 
    if (!confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
        return; // Salir si el usuario cancela la acción
    }
 
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `${API_URL}/cliente/${id_cliente}`, true);
 
    xhr.onload = function () {
        console.log('Respuesta completa del servidor:', this.responseText);
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                console.log('Respuesta JSON analizada:', response);
                if (response.Resultado === 'OK') {
                    console.log('Cliente eliminado exitosamente');
                    alert('Cliente eliminado exitosamente');
                    obtenerTodosLosClientes(); // Actualizar la tabla
                } else {
                    console.error('Error al eliminar el cliente:', response.Mensaje || 'Respuesta inesperada');
                    alert('No se pudo eliminar el cliente.');
                }
            } catch (e) {
                console.error('Error al analizar la respuesta del servidor:', e);
                alert('Error al analizar la respuesta del servidor.');
            }
        } else {
            console.error('Error en la respuesta del servidor:', this.statusText);
            alert('No se pudo completar la solicitud.');
        }
    };
 
    xhr.onerror = function () {
        console.error('Error en la solicitud');
        alert('Ocurrió un error al intentar eliminar el cliente.');
    };
 
    xhr.send();
}