const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Función para obtener todos los datos de la tabla Cliente
function obtenerTodosLasVentas() {
    const xhr = new XMLHttpRequest();

    // Solicitar datos al servidor
    xhr.open('GET', API_URL + '/marcas_ventas', true);

    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta: " + this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();

            try {
                const response = JSON.parse(cleanedText);
                if (response.Resultado && Array.isArray(response.Resultado)) {
                    const marcas_ventas = response.Resultado;

                    // Limpiar la tabla antes de agregar nuevos datos
                    const tbody = document.querySelector('#detalle_venta-table tbody');
                    tbody.innerHTML = '';

                    // Iterar sobre las marcas más vendidas y agregarlas a la tabla
                    marcas_ventas.forEach(marcaVenta => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${marcaVenta.nombre_marca}</td>
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
            console.error('Error al obtener vistas:', this.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Error en la solicitud');
    };

    xhr.send();
}

// Llamar a la función para obtener los datos al cargar la página
document.addEventListener('DOMContentLoaded', obtenerTodosLasVentas);