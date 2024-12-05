$(document).ready(function(){
    tablaProveedores = $("#tablaProveedores").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
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
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formProveedores").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Proveedor");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    idpv = parseInt(fila.find('td:eq(1)').text());
    nombre = fila.find('td:eq(2)').text();
    correo = fila.find('td:eq(3)').text();
    direccion = fila.find('td:eq(4)').text();
    
    $("#idpv").val(idpv);
    $("#nombre").val(nombre);
    $("#correo").val(correo);
    $("#direccion").val(direccion);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Proveedores");            
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
            url: "bd/proveedores.php", 
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaProveedores.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formProveedores").submit(function(e){
    e.preventDefault();  
    idpv = $.trim($("#idpv").val());  
    nombre = $.trim($("#nombre").val());
    correo = $.trim($("#correo").val());
    direccion = $.trim($("#direccion").val());    
    $.ajax({
        url: "bd/proveedores.php",
        type: "POST",
        dataType: "json",
        data: {idpv:idpv, nombre:nombre, correo:correo, direccion:direccion, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id; 
            idpv= data[0].idpv;           
            nombre = data[0].nombre;
            correo = data[0].correo;
            direccion = data[0].direccion;
            if(opcion == 1){tablaProveedores.row.add([id,idpv,nombre,correo,direccion]).draw();}
            else{tablaProveedores.row(fila).data([id,idpv,nombre,correo,direccion]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});