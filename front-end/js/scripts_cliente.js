document.addEventListener('DOMContentLoaded', () => {
    obtenerTodosLosClientes();
 
    document.getElementById('agregar-cliente-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = this;
 
        const data = {
            id_cliente: parseInt(form.id_cliente.value),
            nombre_cliente: form.nombre_cliente.value.trim(),
            apellidos_cliente: form.apellidos_cliente.value.trim(),
            correo: form.correo.value.trim(),
            telefono: parseInt(form.telefono.value),
            direccion: form.direccion.value.trim()
        };
       
        guardarCliente(data);
        form.reset();
    });
 
    document.getElementById('update-cliente-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = this;
        console.log(form.id_cliente.value);
 
        const data = {
            id_cliente: parseInt(form.id_cliente.value),
            nombre_cliente: form.nombre_cliente.value,
            apellidos_cliente: form.apellidos_cliente.value,
            correo: form.correo.value,
            telefono: parseInt(form.telefono.value),
            direccion: form.direccion.value
        };
 
        actualizarCliente(data);
        form.reset();
        form.style.display = 'none';
    });
});
 
