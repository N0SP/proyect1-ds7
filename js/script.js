function actualizarEstado(id, estado) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'functions.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Estado actualizado');
        }
    };
    xhr.send(`id=${id}&estado=${estado ? 'completa' : 'incompleta'}`);
}
