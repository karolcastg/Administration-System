function details(id){
    if (id && id > 0) {
        $.ajax({
            url         : 'pedidos_detalles.php',
            type        : 'post',
            data        : 'id=' + id,
            success     : function(resultado) {
                if (resultado) {
                    window.location.href = 'pedidos_detalles.php?id='+id;
                }
                else{
                    $('#mensaje').html('No se encontró el pedido.');
                } 
            }
        });
    }
}