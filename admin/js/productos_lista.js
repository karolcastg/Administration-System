function eliminado(id){
    if(confirm("¿Quieres eliminar el producto?")){
        if(id && id > 0){
        $.ajax({
            url         : 'funciones/productos_eliminar.php',
            type        : 'post',
            data        : 'id='+id,
            success     : function(resultado){
                console.log(resultado);
                if(resultado == 1){
                    $('#' + id).hide();
                }
                else{
                    $('#mensaje').html('No se pudo eliminar al producto.');
                } 
            }
        });

        }else{
            $('#mensaje').html('No existe el producto.');
            setTimeout("$('#mensaje').html('');", 5000);
        }
    }   
}

function add(){
    window.location.href = 'productos_alta.php';
}

function details(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'productos_detalles.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'productos_detalles.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró el producto.');
                } 
            }
        });
    }
}

function edit(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'productos_editar.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'productos_editar.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró el producto.');
                } 
            }
        });
    }
}