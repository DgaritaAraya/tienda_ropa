const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Funcion para obtener todos los datos de la tabla Venta final //
function obtenerTodasLasVentasFinales() {
    const xhr = new XMLHttpRequest();

// Función para que tome los datos de la tabla Venta final //
    xhr.open('GET', API_URL + '/venta_final', true);

// Evento para cargar el AJAX //
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
            try {
                const venta_final = JSON.parse(cleanedText).Resultado;
                document.querySelector('#venta_final-table tbody').innerHTML = ''; 

                venta_final.forEach(venta_final => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${venta_final.id_venta}</td>
                        <td>${venta_final.id_cliente}</td>
                        <td>${venta_final.id_detalle_venta}</td>
                        <td>${venta_final.fecha_venta_final}</td>
                        <td>${venta_final.total_venta}</td>
                        <td>
                                <button onclick="mostrarFormActualizarCliente(${venta_final.id_venta}, '${venta_final.id_cliente}', '${venta_final.id_detalle_venta}, '${venta_final.fecha_venta_final}, '${venta_final.total_venta})">Actualizar</button>
                                <button onclick="eliminarCliente(${venta_final.id_venta})">Eliminar</button>
                        </td>

                    `;
                    document.querySelector('#venta_final-table tbody').appendChild(tr);
                });
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching venta_final:', this.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Request error...');
    };
    xhr.send();
}
