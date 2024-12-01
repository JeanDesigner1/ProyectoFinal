$(document).ready(function(){
        // Inicializar DataTable
        tablaProductos = $("#tablaPersonas").DataTable({
           "columnDefs":[{
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
        
        $("#btnNuevo").click(function(){
            $("#formPersonas").trigger("reset");
            $(".modal-header").css("background-color", "#1cc88a");
            $(".modal-header").css("color", "white");
            $(".modal-title").text("Nuevo Producto");            
            $("#modalCRUD").modal("show");        
            id = null;
            opcion = 1; // alta
        });    
        
        var fila; // Capturar la fila para editar o borrar el registro
        
        // Botón EDITAR    
        $(document).on("click", ".btnEditar", function(){
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text());
            nombre = fila.find('td:eq(1)').text();
            stock = parseInt(fila.find('td:eq(2)').text());
            price = parseInt(fila.find('td:eq(3)').text());
            
            $("#nombre").val(nombre);
            $("#pais").val(stock);  // Input del stock
            $("#edad").val(price);  // Input del price
            opcion = 2; // editar
            
            $(".modal-header").css("background-color", "#4e73df");
            $(".modal-header").css("color", "white");
            $(".modal-title").text("Editar Producto");            
            $("#modalCRUD").modal("show");  
        });
    
        // Botón BORRAR
        $(document).on("click", ".btnBorrar", function(){    
            fila = $(this);
            id = parseInt($(this).closest("tr").find('td:eq(0)').text());
            opcion = 3; // borrar
            var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
            if(respuesta){
                $.ajax({
                    url: "bd/crud.php",
                    type: "POST",
                    dataType: "json",
                    data: {opcion: opcion, id: id},
                    success: function(){
                        tablaProductos.row(fila.parents('tr')).remove().draw();
                    }
                });
            }   
        });
        
        // Envío del formulario
        $("#formPersonas").submit(function(e){
            e.preventDefault();    
            nombre = $.trim($("#nombre").val());
            stock = $.trim($("#stock").val()); // Campo de stock
            price = $.trim($("#price").val()); // Campo de price
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: {nombre: nombre, stock: stock, price: price, id: id, opcion: opcion},
                success: function(data){  
                    console.log(data);
                    id = data[0].id;            
                    nombre = data[0].nombre;
                    stock = data[0].stock;
                    price = data[0].price;
                    opcion = data[0].opcion;
                    if(opcion == 1){ tablaProductos.row.add([id, nombre, stock, price, opcion]).draw(); }
                    else { tablaProductos.row(fila).data([id, nombre, stock, price, opcion]).draw(); }            
                }        
            });
            $("#modalCRUD").modal("hide");    
        });    
    });

