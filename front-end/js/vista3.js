const API_URL = "http://localhost/plataformas_abiertas/tienda_ropa/API/public/index.php";

// Función para obtener todos los datos de la tabla Cliente
function obtenerTodosLasVentas() {
    const xhr = new XMLHttpRequest();

    // Solicitar datos al servidor
    xhr.open('GET', `${API_URL}/marcas_mas_vendidas`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            console.log("Respuesta del servidor:", this.responseText);
            const cleanedText = this.responseText.replace(/^\uFEFF/, '').trim();

            try {
                const response = JSON.parse(cleanedText);
                if (response.Resultado && Array.isArray(response.Resultado)) {
                    const marca_full = response.Resultado;

                    // Limpiar la tabla antes de agregar nuevos datos
                    const tbody = document.querySelector('#marca_full-table tbody');
                    tbody.innerHTML = '';

                    // Agregar datos a la tabla
                    marca_full.forEach(marca_full => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${marca_full.nombre_marca || 0}</td>
                            <td>${marca_full.total_ventas || 0}</td>
                          
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    console.error("Respuesta inesperada del servidor:", response);
                }
            } catch (e) {
                console.error("Error al analizar la respuesta JSON:", e);
            }
        } else {
            console.error("Error al realizar la solicitud:", this.status, this.statusText);
        }
    };

    xhr.onerror = function () {
        console.error("Error en la conexión al servidor.");
    };

    xhr.send();
}

// Ejecutar la función al cargar la página
document.addEventListener('DOMContentLoaded', obtenerTodosLasVentas);