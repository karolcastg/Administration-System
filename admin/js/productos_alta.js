let validado = false;

function addProduct(){
    var nombre = document.getElementById("nombre").value;
    var codigo = document.getElementById("codigo").value;
    var descripcion = document.getElementById("descripcion").value;
    var costo = document.getElementById("costo").value;
    var stock = document.getElementById("stock").value;
    var archivo = $('#file').prop('files')[0];
    var failmessage = document.getElementById('fail');
    var existingcode = document.getElementById('code');

    let save_data = new FormData();
    save_data.append('nombre',nombre);
    save_data.append('codigo',codigo);
    save_data.append('descripcion',descripcion);
    save_data.append('costo',costo);
    save_data.append('stock',stock);
    save_data.append('file',archivo);

    if(nombre != "" && codigo != '' && descripcion != '' && costo != '' && stock != '' && archivo != undefined){
        if(validado == false){
            $.ajax({
                url         : 'funciones/productos_salva.php',
                type        : 'post',
                dataType    : 'text',
                data        : save_data,
                contentType : false,
                processData : false,
                success     : function(resultado){
                    console.log(resultado);
                    if (resultado = 1) {
                        window.location.href = "productos_lista.php";
                    }
                }
            });

            return true;
        }else{
            existingcode.style.display = 'block';
            setTimeout(function(){
                existingcode.style.display = 'none';
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

function validCode(){
    var existingcode = document.getElementById('code');
    codigo = $('#codigo').val();
    if (codigo != '') {
        $.ajax({
            url         : 'funciones/verificarCodigo.php',
            type        : 'post',
            dataType    : 'text',
            data        : 'codigo=' + codigo,
            success     : function(resultado){
                console.log(resultado);
                if (resultado == true){
                    existingcode.style.display = 'block';
                    setTimeout(function(){
                        existingcode.style.display = 'none';
                    }, 5000); 

                    validado = true;
                }else{
                    validado = false;
                }
            }
        });
    }
}