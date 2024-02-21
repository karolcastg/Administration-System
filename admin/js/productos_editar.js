let validado = false;

function validaDatosEditados(id) {
    var nombre = document.getElementById("nombre").value;
    var codigo = document.getElementById("codigo").value;
    var descripcion = document.getElementById("descripcion").value;
    var costo = document.getElementById("costo").value;
    var stock = document.getElementById("stock").value;
    var archivo = $('#file').prop('files')[0];
    var failmessage = document.getElementById('fail');
    var existingcode = document.getElementById('code');

    let save_data = new FormData();
    save_data.append('id', id);
    save_data.append('nombre',nombre);
    save_data.append('codigo',codigo);
    save_data.append('descripcion',descripcion);
    save_data.append('costo',costo);
    save_data.append('stock',stock);
    save_data.append('file',archivo);
    
    if(nombre != "" && codigo != '' && descripcion != '' && costo != '' && stock != ''){
        if (validado == false) {
            $.ajax({
                url: 'funciones/productos_update.php',
                type: 'post',
                dataType: 'text',
                data: save_data,
                contentType: false,
                processData: false,
                success: function (resultado) {
                    console.log(resultado);
                    if (resultado) {
                        window.location.href = 'productos_lista.php';
                    }
                    else {
                        $('#mensaje').html('No se encontró la promoción.');
                    }
                }
            });

            return true;
        } else {
            existingcode.style.display = 'block';
            setTimeout(function () {
                existingcode.style.display = 'none';
            }, 5000);
            return false;
        }
        
    } else {
        failmessage.style.display = 'block';
        setTimeout(function() {
            failmessage.style.display = 'none';
        }, 5000); 
        return false;
    }

}

function validCode(id) {
    var existingcode = document.getElementById('code');
    code = $('#code').val();
    if (code !== '') {
        $.ajax({
            url: 'funciones/verificarCodigoEditar.php',
            type: 'post',
            dataType: 'text',
            data: { code: code, id: id },
            success: function (resultado) {
                console.log(resultado)
                if (resultado == true) {
                    existingcode.style.display = 'block';
                    setTimeout(function () {
                        existingcode.style.display = 'none';
                    }, 5000);

                    validado = true;
                } else {
                    validado = false;
                }
            }
        });
    }
}

function back() {
    window.location.href = 'productos_lista.php';
}
