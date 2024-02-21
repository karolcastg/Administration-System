let validado = false;

function validaDatos(id) {
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var correo = document.getElementById("correo").value;
    var pass = document.getElementById("pass").value;
    var rol = document.getElementById("rol").value;
    var archivo = $('#file').prop('files')[0];
    var failmessage = document.getElementById('fail');
    var existingmail = document.getElementById('mail');

    let data_send = new FormData();
    data_send.append('id', id);
    data_send.append('nombre', nombre);
    data_send.append('apellidos', apellidos);
    data_send.append('correo', correo);
    data_send.append('pass', pass);
    data_send.append('rol', rol);
    data_send.append('file', archivo);
    
    if(nombre != '' && apellidos != '' && correo != '' && rol != ''){
        if (validado == false) {
            $.ajax({
                url: 'funciones/empleados_update.php',
                type: 'post',
                dataType: 'text',
                data: data_send,
                contentType: false,
                processData: false,
                success: function (resultado) {
                    console.log(resultado);
                    if (resultado) {
                        window.location.href = 'empleados_lista.php';
                    }
                    else {
                        $('#mensaje').html('No se encontró al empleado.');
                    }
                }
            });

            return true;
        } else {
            existingmail.style.display = 'block';
            setTimeout(function () {
                existingmail.style.display = 'none';
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

function validMail(id) {
    var existingmail = document.getElementById('mail');
    correo = $('#correo').val();
    if (correo !== '') {
        $.ajax({
            url: 'funciones/verificaCorreoEditar.php',
            type: 'post',
            dataType: 'text',
            data: { correo: correo, id: id },
            success: function (resultado) {
                console.log(resultado)
                if (resultado == true) {
                    existingmail.style.display = 'block';
                    setTimeout(function () {
                        existingmail.style.display = 'none';
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
    window.location.href = 'empleados_lista.php';
}
