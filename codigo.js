$('#formLogin').submit(function(e) {
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var contrasena = $.trim($("#contrasena").val());

    if (usuario.length == "" || contrasena == "") {
        Swal.fire({
            icon: 'warning',
            title: 'Debe ingresar un usuario y/o password',
        });
        return false; 
    } else {
        $.ajax({
            url: "bd/login.php",
            type: "POST",
            dataType: "json",
            data: { usuario: usuario, contrasena: contrasena  }, 
            success: function(data) {
                if (data == "null") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario y/o password incorrecta',
                    });
                } else {
                    // Verificar el rol del usuario
                    var rol = data.rol; // Asumiendo que 'rol' viene en la respuesta JSON del servidor
                    Swal.fire({
                        icon: 'success',
                        title: '¡Conexión exitosa!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ingresar'
                    }).then((result) => {
                        if (result.value) {
                            if (rol == 1) {
                                window.location.href = "dashboard/index.php"; // Rol de administrador
                            } else if (rol == 2) {
                                window.location.href = "dashboard/indexUsuarios.php"; // Rol de usuario
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Rol no reconocido',
                                });
                            }
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Ocurrió un error al intentar conectar con el servidor',
                });
            }
        });
    }     
});
