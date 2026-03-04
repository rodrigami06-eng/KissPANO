document.addEventListener('DOMContentLoaded', function() {
    let indice = 0; // Contador para los perfiles
    const contenedor = document.getElementById('contain-producto');
    const template = document.getElementById('pv-template').innerHTML;

    // Función para agregar perfil
    document.getElementById('btn-add-prodvent').addEventListener('click', function() {
        // Reemplazamos el marcador {index} por el número actual
        let nuevoHTML = template.replace(/{index}/g, indice);
        
        // Creamos un elemento temporal para insertar el HTML
        let divo = document.createElement('div');
        divo.innerHTML = nuevoHTML;
        
        // Lo agregamos al contenedor real
        contenedor.appendChild(divo);
        
        indice++; // Aumentamos para el siguiente
    });

    // Función para eliminar (usando delegación de eventos)
    contenedor.addEventListener('click', function(e) {
        if (e.target.classList.contains('eliminar-prod')) {
            e.target.closest('.p-item').remove();
        }
    });
});