const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Funcion para obtener todos los datos de la tabla Marca //
function obtenerTodasLasMarcas() {
    const xhr = new XMLHttpRequest();

// Función para que tome los datos de la tabla Marca //
    xhr.open('GET', API_URL + '/marca', true);

// Evento para cargar el AJAX //
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
            try {
                const marca = JSON.parse(cleanedText).Resultado;
                document.querySelector('#marca-table tbody').innerHTML = ''; 

                marca.forEach(marca => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${marca.id_marca}</td>
                        <td>${marca.id_proveedor}</td>
                        <td>${marca.nombre_marca}</td>
                        <td>${marca.pais}</td>
                        <td>
                                <button onclick="mostrarFormActualizarCliente(${marca.id_marca}, '${marca.id_proveedor}', '${marca.nombre_marca}, '${marca.pais})">Actualizar</button>
                                <button onclick="eliminarCliente(${marca.id_marca})">Eliminar</button>
                            </td>

                    `;
                    document.querySelector('#marca-table tbody').appendChild(tr);
                });
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching marca:', this.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Request error...');
    };
    xhr.send();
}












