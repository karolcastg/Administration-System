function eliminado(id){
    if(confirm("¿Quieres eliminar esta promoción?")){
        if(id && id > 0){
        $.ajax({
            url         : 'funciones/promociones_eliminar.php',
            type        : 'post',
            data        : 'id='+id,
            success     : function(resultado){
                console.log(resultado);
                if(resultado == 1){
                    $('#' + id).hide();
                }
                else{
                    $('#mensaje').html('No se pudo eliminar la promoción.');
                } 
            }
        });

        }else{
            $('#mensaje').html('No existe la promoción.');
            setTimeout("$('#mensaje').html('');", 5000);
        }
    }   
}

function add(){
    window.location.href = 'promociones_alta.php';
}

function details(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'promociones_detalles.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'promociones_detalles.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró la promoción.');
                } 
            }
        });
    }
}

function edit(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'promociones_editar.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'promociones_editar.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró la promoción.');
                } 
            }
        });
    }
}