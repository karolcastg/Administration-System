function eliminado(id){
    if(confirm("¿Quieres eliminar al empleado?")){
        if(id && id > 0){
        $.ajax({
            url         : 'funciones/empleados_elimina.php',
            type        : 'post',
            data        : 'id='+id,
            success     : function(resultado){
                console.log(resultado);
                if(resultado == 1){
                    $('#' + id).hide();
                }
                else{
                    $('#mensaje').html('No se pudo eliminar al empleado.');
                } 
            }
        });

        }else{
            $('#mensaje').html('No existe el empleado.');
            setTimeout("$('#mensaje').html('');", 5000);
        }
    }   
}

function add(){
    window.location.href = 'empleados_alta.php';
}

function details(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'empleados_detalles.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'empleados_detalles.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró al empleado.');
                } 
            }
        });
    }
}

function edit(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'empleados_editar.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'empleados_editar.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró al empleado.');
                } 
            }
        });
    }
}