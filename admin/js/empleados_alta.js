let validado = false;

function validaDatos(){
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var correo = document.getElementById("correo").value;
    var pass = document.getElementById("pass").value;
    var rol = document.getElementById("rol").value;
    var archivo = $('#file').prop('files')[0];
    var failmessage = document.getElementById('fail');
    var existingmail = document.getElementById('mail');

    let save_data = new FormData();
    save_data.append('nombre',nombre);
    save_data.append('apellidos',apellidos);
    save_data.append('correo',correo);
    save_data.append('pass',pass);
    save_data.append('rol',rol);
    save_data.append('file',archivo);

    if(nombre != "" && apellidos != '' && correo != '' && pass != '' && rol != '' && archivo != undefined){
        if(validado == false){
            $.ajax({
                url         : 'funciones/empleados_salva.php',
                type        : 'post',
                dataType    : 'text',
                data        : save_data,
                contentType : false,
                processData : false,
                success     : function(resultado){
                    console.log(resultado);
                    if (resultado = 1) {
                        window.location.href = "empleados_lista.php";
                    }
                }
            });

            return true;
        }else{
            existingmail.style.display = 'block';
            setTimeout(function(){
                existingmail.style.display = 'none';
            }, 5000); 
            return false;
        }
    }else{
        failmessage.style.display = 'block';
        setTimeout(function(){
        failmessage.style.display = 'none';
        }, 5000);   

        return false;
    }
}

function validMail(){
    var existingmail = document.getElementById('mail');
    correo = $('#correo').val();
    if (correo != '') {
        $.ajax({
            url         : 'funciones/verificaCorreo.php',
            type        : 'post',
            dataType    : 'text',
            data        : 'correo=' + correo,
            success     : function(resultado){
                console.log(resultado);
                if (resultado == true){
                    existingmail.style.display = 'block';
                    setTimeout(function(){
                        existingmail.style.display = 'none';
                    }, 5000); 

                    validado = true;
                }else{
                    validado = false;
                }
            }
        });
    }
}
