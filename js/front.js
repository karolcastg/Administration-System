//validación de usuario en el login
function user(){
    var correo = $('#mail').val();
    var pass = $('#pass').val();
    var failmessage = document.getElementById('fail');
    var fakeuser = document.getElementById('fake');
    if (correo != '' && pass != '') {
        $.ajax({
            url: 'http://localhost/proyecto01/funciones/validar_usuario.php',
            type: 'post',
            dataType: 'text',
            data: {correo: correo, pass: pass},
            success: function (resultado) {
                console.log(resultado);
                if (resultado == "correcto") {
                    window.location.href = 'http://localhost/proyecto01/carrito1.php';
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

//enviar correo en el apartado de contacto
function Mail() {
    var nombre = $('#nombre').val();
    var asunto = $('#asunto').val();
    var correo = $('#correo').val();
    var mensaje = $('#mensaje').val();
    if (nombre != '' && correo != '' && mensaje != '') {
        let data_send = new FormData();
        data_send.append('nombre', nombre);
        data_send.append('asunto', asunto);
        data_send.append('correo', correo);
        data_send.append('mensaje', mensaje);
        $.ajax({
            url: 'funciones/mail.php',
            type: 'post',
            dataType: 'text',
            data: data_send,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res);
                if (res == 1) {
                    alert('Correo enviado');
                } else {
                    alert('No se envió el correo');
                }
            }
        });
    } else {
        failmessage.style.display = 'block';
        setTimeout(function(){
        failmessage.style.display = 'none';
        }, 5000);  
    }
}

function ver_detalles(id){
    window.location.href = 'http://localhost/proyecto01/detalles.php?id='+id;
}

function agregar(id_producto){
    var added = document.getElementById('added');
    var empty = document.getElementById('empty');
    var cantidad = $('#cantidad_' + id_producto).val();
    if (cantidad > 0) {
        $.ajax({
            url: 'funciones/insertar_producto.php',
            type: 'post',
            dataType: 'text',
            data: {id_producto:id_producto, cantidad:cantidad },
            success: function (res) {
                console.log(res);
                if (res == 1) {
                    added.style.display = 'block';
                    setTimeout(function(){
                        added.style.display = 'none';
                    }, 5000); 
                } else {
                    empty.style.display = 'block';
                    setTimeout(function(){
                        empty.style.display = 'none';
                    }, 5000); 
                }
            }
        });
    }
}

function eliminar(id_producto){
    if(confirm('¿Desea eliminar el producto?')) {
        $.ajax({
            url: 'funciones/eliminar_producto.php',
            type: 'post',
            dataType: 'text',
            data: {id:id_producto },
            success: function (res) {
                if (res == 1) {
                    $('#'+id_producto).hide();
                }
            }
        });
    }
}

function subtotal(id, precio) {
    var cantidad = $('#cantidad_' + id).val();
    $.ajax({
        url: 'funciones/subtotal.php',
        type: 'post',
        dataType: 'text',
        data: { id: id, cantidad: cantidad },
        success: function (res) {
            if (res == 1) {
                let subtotal = cantidad * precio;
                $('#subtotal_' + id).html('$' + subtotal);

                total_pedido();
            }
        }
    });
}

function total_pedido() {
    var total_pedido = 0;

    $('[id^="subtotal_"]').each(function () {
        var subtotal = parseFloat($(this).text().replace('$', ''));
        total_pedido += subtotal;
    });

    $('#total_pedido').html('$' + total_pedido);
}

function enviar(id) {
    var fail = document.getElementById('fail');
    $.ajax({
        url: 'funciones/cerrar_pedido.php',
        type: 'post',
        dataType: 'text',
        data: {id:id},
        success: function (res) {
            if (res == 1) {
                window.location.href = 'carrito2.php';
            }else {
                fail.style.display = 'block';
                setTimeout(function(){
                    fail.style.display = 'none';
                }, 5000); 
            }
        }
    });
}
