function addProm(){
    var nombre = document.getElementById("nombre").value;
    var archivo = $('#file').prop('files')[0];
    var failmessage = document.getElementById('fail');

    let save_data = new FormData();
    save_data.append('nombre',nombre);
    save_data.append('file',archivo);

    if(nombre != "" && archivo != undefined){
        $.ajax({
            url         : 'funciones/promociones_salva.php',
            type        : 'post',
            dataType    : 'text',
            data        : save_data,
            contentType : false,
            processData : false,
            success     : function(resultado){
                console.log(resultado);
                if (resultado = 1) {
                    window.location.href = "promociones_lista.php";
                }
            }
        });
    }else{
        failmessage.style.display = 'block';
        setTimeout(function(){
        failmessage.style.display = 'none';
        }, 5000);   

        return false;
    }
}