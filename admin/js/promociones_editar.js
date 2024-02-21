function validaDatosEditados(id) {
    var nombre = document.getElementById("nombre").value;
    var archivo = $('#file').prop('files')[0];
    var failmessage = document.getElementById('fail');

    let save_data = new FormData();
    save_data.append('id', id);
    save_data.append('nombre',nombre);
    save_data.append('file',archivo);
    
    if(nombre != ""){
        $.ajax({
            url: 'funciones/promociones_update.php',
            type: 'post',
            dataType: 'text',
            data: save_data,
            contentType: false,
            processData: false,
            success: function (resultado) {
                console.log(resultado);
                if (resultado) {
                    window.location.href = 'promociones_lista.php';
                }
                else {
                    $('#mensaje').html('No se encontró la promoción.');
                }
            }
        });     
    } else {
        failmessage.style.display = 'block';
        setTimeout(function() {
            failmessage.style.display = 'none';
        }, 5000); 
        return false;
    }

}

function back() {
    window.location.href = 'promociones_lista.php';
}
