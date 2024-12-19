const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Funcion para obtener todos los datos de la tabla Prenda //
function obtenerTodasLasPrendas() {
    const xhr = new XMLHttpRequest();

// Función para que tome los datos de la tabla Prenda //
    xhr.open('GET', API_URL + '/prenda', true);

// Evento para cargar el AJAX //
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
            try {
                const prenda = JSON.parse(cleanedText).Resultado; 
                document.querySelector('#prenda-table tbody').innerHTML = ''; 

                prenda.forEach(prenda => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${prenda.id_prenda}</td>
                        <td>${prenda.id_marca}</td>
                        <td>${prenda.nombre_prenda}</td>
                        <td>${prenda.descripcion}</td>
                        <td>${prenda.color}</td>
                        <td>${prenda.talla}</td>
                        <td>${prenda.precio}</td>
                        <td>
                            <button onclick="mostrarFormActualizarCliente(${prenda.id_prenda}, '${prenda.id_marca}', '${prenda.nombre_prenda}, '${prenda.descripcion}, '${prenda.color}, '${prenda.talla}, '${prenda.precio})">Actualizar</button>
                            <button onclick="eliminarCliente(${prenda.id_prenda})">Eliminar</button>
                        </td>
                    `;
                    document.querySelector('#prenda-table tbody').appendChild(tr);
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