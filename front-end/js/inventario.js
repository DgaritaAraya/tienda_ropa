const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";


// Función para obtener todos los datos de la tabla Inventario
function obtenerTodosLosInventario () {
    const xhr = new XMLHttpRequest();
 
    // Solicitar datos al servidor
    xhr.open('GET', API_URL + '/inventario', true);
 
    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();
 
            try {
                const response = JSON.parse(cleanedText);
                if (response.Resultado && Array.isArray(response.Resultado)) {
                    const inventario = response.Resultado;
 
                    // Limpiar la tabla antes de agregar nuevos datos
                    const tbody = document.querySelector('#inventario-table tbody');
                    tbody.innerHTML = '';
 
                    // Iterar sobre los clientes y agregarlos a la tabla
                    inventario.forEach(inventario => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${inventario.id_inventario}</td>
                            <td>${inventario.id_prenda}</td>
                            <td>${inventario.id_proveedor}</td>
                            <td>${inventario.cant_en_stock}</td>
                            <td>${inventario.fecha_de_recibo}</td>
                            <td>
                                <button onclick="mostrarFormActualizarCliente(${inventario.id_inventario}, '${inventario.id_prenda}', '${inventario.id_proveedor}, '${inventario.cant_en_stock}, '${inventario.fecha_de_recibo},)">Actualizar</button>
                                <button onclick="eliminarCliente(${inventario.id_inventario})">Eliminar</button>
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
 