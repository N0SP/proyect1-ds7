function actualizarEstado(boton) {
    const id = boton.getAttribute('data-id');
    const estado = boton.getAttribute('data-estado');
    let nuevoEstado;

    if (estado === 'pendiente') {
        nuevoEstado = 'en_proceso';
    } else if (estado === 'en_proceso') {
        nuevoEstado = 'completa';
    } else if (estado === 'completa') {
        nuevoEstado = 'pendiente';
    }

    // Agregar declaraciones de console.log para verificar los valores para guiarme.
    console.log('ID:', id);
    console.log('Estado actual:', estado);
    console.log('Nuevo estado:', nuevoEstado);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', './crud/actualizar_estado.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            if (estado === 'pendiente') {
                boton.classList.remove('btn-warning', 'btn-success', 'btn-danger');
                boton.classList.add('btn-danger');
            } else if (estado === 'en_proceso') {
                boton.classList.remove('btn-warning', 'btn-success', 'btn-danger');
                boton.classList.add('btn-success');
            } else if (estado === 'completa') {
                boton.classList.remove('btn-warning', 'btn-success', 'btn-danger');
                boton.classList.add('btn-warning');
            }
            boton.setAttribute('data-estado', nuevoEstado);
            boton.textContent = nuevoEstado;
        }
    };
    xhr.send(`id=${id}&estado=${nuevoEstado}`);
}

function eliminarTarea(boton) {
    const id = boton.getAttribute('data-id');
    console.log('ID:', id);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', './crud/eliminar_tarea.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            boton.parentElement.parentElement.remove();
        }
    };
    xhr.send(`id=${id}`);
}