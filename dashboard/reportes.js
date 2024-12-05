$(document).ready(function () {
    var tablaReportes = $("#tablaReportes").DataTable({
        ajax: {
            url: "bd/reportes.php",
            method: "POST",
            data: { opcion: 4 },
            dataSrc: ""
        },
        columns: [
            { data: "id" },
            { data: "idreporte" },
            { data: "idusuario" },
            { data: "fecha_reporte" },
            { data: "descripcion" },
            {
                defaultContent:
                    "<div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div>"
            }
        ]
    });

    // Nuevo reporte
    $("#btnNuevo").click(function () {
        $("#formReportes").trigger("reset");
        $(".modal-title").text("Nuevo Reporte");
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; // Alta
    });

    // Editar reporte
    $(document).on("click", ".btnEditar", function () {
        var fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text());
        idusuario = parseInt(fila.find("td:eq(2)").text());
        descripcion = fila.find("td:eq(4)").text();
        $("#idusuario").val(idusuario);
        $("#descripcion").val(descripcion);
        opcion = 2; // Editar
        $(".modal-title").text("Editar Reporte");
        $("#modalCRUD").modal("show");
    });

    // Guardar cambios
    $("#formReportes").submit(function (e) {
        e.preventDefault();
        idusuario = $("#idusuario").val();
        descripcion = $("#descripcion").val();
        $.ajax({
            url: "bd/reportes.php",
            method: "POST",
            data: { id: id, idusuario: idusuario, descripcion: descripcion, opcion: opcion },
            success: function () {
                tablaReportes.ajax.reload();
                $("#modalCRUD").modal("hide");
            }
        });
    });

    // Borrar reporte
    $(document).on("click", ".btnBorrar", function () {
        var fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text());
        opcion = 3; // Borrar
        if (confirm("¿Está seguro de eliminar el reporte?")) {
            $.ajax({
                url: "bd/reportes.php",
                method: "POST",
                data: { id: id, opcion: opcion },
                success: function () {
                    tablaReportes.ajax.reload();
                }
            });
        }
    });
});
