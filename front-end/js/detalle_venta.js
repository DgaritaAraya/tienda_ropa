const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";


// Función para obtener todos los datos de la tabla Cliente //
function obtenerTodosLosDetalles () {
    const xhr = new XMLHttpRequest();
 
    // Solicitar datos al servidor //
    xhr.open('GET', API_URL + '/detalle_venta', true);
 
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
 
            try {
                const response = JSON.parse(cleanedText);
                if (response.Resultado && Array.isArray(response.Resultado)) {
                    const detalle_venta = response.Resultado;
 
                    // Codigo para limpiar la tabla antes de agregar nuevos datos //
                    const tbody = document.querySelector('#detalle_venta-table tbody');
                    tbody.innerHTML = '';
 
                    // Iterar sobre los clientes y agregarlos a la tabla
                    detalle_venta.forEach(detalle_venta => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${detalle_venta.id_detalle_venta}</td>
                            <td>${detalle_venta.id_prenda}</td>
                            <td>${detalle_venta.cantidad}</td>
                            <td>
                                <button onclick="mostrarFormActualizarCliente(${detalle_venta.id_detalle_venta}, '${detalle_venta.id_prenda}')">Actualizar</button>
                                <button onclick="eliminarCliente(${detalle_venta.id_detalle_venta})">Eliminar</button>
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
 
