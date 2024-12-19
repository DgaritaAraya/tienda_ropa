const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Funcion para obtener todos los datos de la tabla Proveedor //
function obtenerTodosLosProveedores() {
    const xhr = new XMLHttpRequest();

// Función para que tome los datos de la tabla Proveedor //
    xhr.open('GET', API_URL + '/proveedor', true);

// Evento para cargar el AJAX //
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
            try {
                const proveedor = JSON.parse(cleanedText).Resultado; 
                document.querySelector('#proveedor-table tbody').innerHTML = ''; 

                proveedor.forEach(proveedor => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${proveedor.id_proveedor}</td>
                        <td>${proveedor.nombre_proveedor}</td>
                        <td>${proveedor.direccion}</td>
                        <td>${proveedor.correo_proveedor}</td>
                        <td>
                            <button onclick="mostrarFormActualizarCliente(${proveedor.id_proveedor}, '${proveedor.nombre_proveedor}', '${proveedor.direccion}, '${proveedor.correo_proveedor})">Actualizar</button>
                            <button onclick="eliminarCliente(${proveedor.id_proveedor})">Eliminar</button>
                        </td>
                    `;
                    document.querySelector('#proveedor-table tbody').appendChild(tr);
                });
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching prenda:', this.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Request error...');
    };
    xhr.send();
}









