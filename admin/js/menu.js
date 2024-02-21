function logout() {
    $.ajax({
        url: 'http://localhost/proyecto01/admin/empleados/funciones/cerrar_sesion.php',
        type: 'post',
        dataType: 'text',
        success: function (res) {
           if(res){
                window.location.href = 'http://localhost/proyecto01/admin/index.php';
           }
        }
    });
} 