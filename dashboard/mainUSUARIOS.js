tablaProductos = $("#tablaProductos").DataTable({
    "columnDefs": [{
        "targets": -1,
        "data": null,
        "defaultContent": `
            <div class='text-center'>
                <div class='btn-group'>
                    <button class='btn btn-primary btnEditar'>Editar</button>
                    <button class='btn btn-danger btnBorrar'>Borrar</button>
                    <button class='btn btn-warning btnDevolucion'>Devoluciones</button>
                </div>
            </div>`
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

// Botón "Devoluciones"
$(document).on("click", ".btnDevolucion", function () {
    fila = $(this).closest("tr"); // Selecciona la fila correspondiente
    id = parseInt(fila.find('td:eq(0)').text()); // Obtiene el ID del producto
    var stockActual = parseInt(fila.find('td:eq(5)').text()); // Obtiene el stock actual
    var cantidadDevolucion = prompt("Ingrese la cantidad a devolver:", 0);

    // Validar que se haya ingresado un número válido
    if (cantidadDevolucion !== null && cantidadDevolucion > 0) {
        var nuevoStock = stockActual - cantidadDevolucion; // Calcula el nuevo stock

        if (nuevoStock < 0) {
            alert("La cantidad a devolver no puede ser mayor al stock actual.");
            return;
        }

        // Llama al servidor para actualizar la base de datos
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {
                opcion: 4, // Nueva opción para devolución
                id: id,
                nuevoStock: nuevoStock,
            },
            success: function (response) {
                if (response.success) {
                    // Actualiza solo la fila correspondiente en el DataTable
                    tablaProductos.row(fila).data([
                        fila.find('td:eq(0)').text(), // ID
                        fila.find('td:eq(1)').text(), // ID Producto
                        fila.find('td:eq(2)').text(), // ID Proveedor
                        fila.find('td:eq(3)').text(), // Nombre
                        fila.find('td:eq(4)').text(), // Descripción
                        nuevoStock, // Nuevo stock
                        fila.find('td:eq(6)').text(), // Precio
                        fila.find('td:eq(7)').text(), // Categoría
                        fila.find('td:eq(8)').text(), // Lote
                        fila.find('td:eq(9)').html(), // Acciones (sin cambios)
                    ]).draw();

                    alert("Devolución realizada con éxito.");
                } else {
                    alert("Error al realizar la devolución. Inténtelo nuevamente.");
                }
            },
        });
    }
});



    
$("#btnNuevo").click(function(){
    $("#formProductos").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Producto");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    idproveedor = parseInt(fila.find('td:eq(2)').text());
    idproducto = parseInt(fila.find('td:eq(1)').text());
    nombre = fila.find('td:eq(3)').text();
    descripcion = fila.find('td:eq(4)').text();
    stock = parseInt(fila.find('td:eq(5)').text());
    price = parseInt(fila.find('td:eq(6)').text());
    categoria = fila.find('td:eq(7)').text();
    lote = fila.find('td:eq(8)').text();
    
    $("#idproducto").val(idproducto);
    $("#idproveedor").val(idproveedor);
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $("#stock").val(stock);
    $("#price").val(price);
    $("#categoria").val(categoria);
    $("#lote").val(lote);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Productos");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaProductos.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formProductos").submit(function(e){
    e.preventDefault();    
        
    idproducto = $.trim($("#idproducto").val());
    idproveedor = $.trim($("#idproveedor").val());
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val());
    stock = $.trim($("#stock").val());
    price = $.trim($("#price").val());
    categoria = $.trim($("#categoria").val());
    lote = $.trim($("#lote").val());


    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {
            idproducto: idproducto,
            idproveedor: idproveedor,
            nombre: nombre,
            descripcion: descripcion,
            stock: stock,
            price: price,
            categoria: categoria,
            lote: lote,
            id: id,
            
        },
        success: function (data) {
            console.log(data);
            id = data[0].id;
            idproducto = data[0].idproducto;
            idproveedor = data[0].idproveedor;
            nombre = data[0].nombre;
            descripcion = data[0].descripcion;
            stock = data[0].stock;
            price = data[0].price;
            categoria = data[0].categoria;
            lote = data[0].lote;
    
            // Actualización de la tabla según la opción
            if (opcion == 1) {
                tablaProductos.row.add([
                    id,
                    idproducto,
                    idproveedor,
                    nombre,
                    descripcion,
                    stock,
                    price,
                    categoria,
                    lote,
                ]).draw();
            } else {
                tablaProductos.row(fila).data([
                    id,
                    idproducto,
                    idproveedor,
                    nombre,
                    descripcion,
                    stock,
                    price,
                    categoria,
                    lote,
                ]).draw();
            }            
        }           
    });
    $("#modalCRUD").modal("hide");    
    
});    


$("#formDevolucion").submit(function (e) {
    e.preventDefault();

    const idProducto = $("#idProductoDevolucion").val();
    const cantidadDevolucion = $("#cantidadDevolucion").val();

    if (cantidadDevolucion <= 0) {
        alert("La cantidad a devolver debe ser mayor a 0.");
        return;
    }

    $.ajax({
        url: "bd/devolucion.php",
        type: "POST",
        dataType: "json",
        data: {
            idProducto: idProducto,
            cantidadDevolucion: cantidadDevolucion
        },
        success: function (response) {
            if (response.status === "success") {
                alert("Devolución realizada con éxito.");
                $("#modalDevolucion").modal("hide");

                // Actualizar stock en la tabla
                const fila = $(`#tablaProductos tbody tr:contains(${idProducto})`);
                const nuevoStock = response.nuevoStock;
                fila.find("td:eq(5)").text(nuevoStock); // Columna de stock
            } else {
                alert(response.message);
            }
        },
        error: function () {
            alert("Error al procesar la devolución.");
        }
    });
});

    
