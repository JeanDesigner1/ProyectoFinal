$(document).ready(function () {
    tablaUsuarios = $("#tablaUsuarios").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

    // Botón NUEVO
    $("#btnNuevo").click(function () {
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Usuario");
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; // alta
    });

    var fila; // capturar la fila para editar o borrar el registro

    // Botón EDITAR
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        usuario = fila.find('td:eq(1)').text();
        contrasena = fila.find('td:eq(2)').text();
        rol = parseInt(fila.find('td:eq(3)').text());

        $("#usuario").val(usuario);
        $("#contrasena").val(contrasena);
        $("#rol").val(rol);
        opcion = 2; // editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");
        $("#modalCRUD").modal("show");
    });

    // Botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3; // borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/administrarUsuarios.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id: id },
                success: function () {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    // Formulario SUBMIT
    $("#formUsuarios").submit(function (e) {
        e.preventDefault();

        usuario = $.trim($("#usuario").val());
        contrasena = $.trim($("#contrasena").val());
        rol = $.trim($("#rol").val());

        $.ajax({
            url: "bd/administrarUsuarios.php",
            type: "POST",
            dataType: "json",
            data: {
                usuario: usuario,
                contrasena: contrasena,
                rol: rol,
                id: id,
                opcion: opcion,
            },
            success: function (data) {
                console.log(data);
                id = data[0].id;
                usuario = data[0].usuario;
                contrasena = data[0].contrasena;
                rol = data[0].rol;

                // Actualización de la tabla según la opción
                if (opcion == 1) {
                    tablaUsuarios.row.add([
                        id,
                        usuario,
                        contrasena,
                        rol,
                    ]).draw();
                } else {
                    tablaUsuarios.row(fila).data([
                        id,
                        usuario,
                        contrasena,
                        rol,
                    ]).draw();
                }
            }
        });
        $("#modalCRUD").modal("hide");
    });
});
