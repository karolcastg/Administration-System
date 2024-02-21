function user(){
    var correo = $('#mail').val();
    var pass = $('#pass').val();
    var failmessage = document.getElementById('fail');
    var fakeuser = document.getElementById('fake');
    if (correo != '' && pass != '') {
        $.ajax({
            url: 'empleados/funciones/validar_usuario.php',
            type: 'post',
            dataType: 'text',
            data: {correo: correo, pass: pass},
            success: function (resultado) {
                console.log(resultado);
                if (resultado == "correcto") {
                    window.location.href = 'bienvenido.php';
                } else if(resultado == "incorrecto") {
                    fakeuser.style.display = 'block';
                    setTimeout(function(){
                        fakeuser.style.display = 'none';
                    }, 5000); 
                }
            }
        });
    }else {
        failmessage.style.display = 'block';
        setTimeout(function(){
            failmessage.style.display = 'none';
        }, 5000); 
    }
}