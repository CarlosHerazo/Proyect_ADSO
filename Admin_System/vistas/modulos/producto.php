<!-- CONTENT HEADER -->
<section class="content-header">
    <style>
        .activo-color {
            background-color: #4caf54;
            font-weight: 700;
        }

        .inactivo-color {
            background-color: #FF5252;
            font-weight: 700;
            color: #fff;
        }
    </style>
    <div class="container-fluid">
        <div class="row md-2">
            <div class="col-sm-6">
                <h1>Administrar Productos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio / </a></li>
                    <li class="Breadcrumb-item active">Gestor de Productos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /. CONRENT HEADER-->
<!--  Content-->
<section class="container-fluid">

    <div class="btn-agregar-producto btn-agregar ">
        <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-actualizar-producto" data-dismiss="modal"><i class="fas fa-plus-square"></i>
            Agregar Producto </button>
    </div>
</section>
<div class="container-fluid">
    <div class="table-responsive">
        <table id="tablaProductos" class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table table-striped table-hover">

            </tbody>
        </table>
    </div>
</div>
<!-- ./Content -->

<!-- ventana modal para registro y actualizacion -->

<div class="modal fade" id="modal-actualizar-producto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!---===============
        MODAL HEADER
        ========================--->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Agregar Producto</h4>
                <button type="buttom" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!---===============
        MODAL BODY
        ========================--->
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" name="codigo" id="idProducto" value="">
                            <label for="nombreP">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombreP">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="precioP">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precioP">
                    </div>
                    <div class="col-sm-4">
                        <label for="cantidadP">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidadP">
                    </div>
                    <div class="col-sm-4">
                        <label for="estadoP">Estado</label>
                        <select type="text" class="form-control" name="estado" id="estadoP">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="imagenP">Imagen</label>
                        <input type="text" class="form-control" name="imagen" id="imagenP" placeholder="ingrese la ruta de la imagen">
                    </div>
                    <div class="col-sm-4">
                        <label for="categoriaP">categoria</label>
                        <select type="number" class="form-control" name="estado" id="categoriaP">
                            <option value="1">Tuberculos</option>
                            <option value="2">Frutas</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="descripcionP">Descripcion</label>
                        <textarea type="text" class="form-control" rows="5" name="descripcion" id="descripcionP"></textarea>
                    </div>
                </div>
            </div>
            <!---===============
        MODAL FOOTER
        ========================--->
            <div class="modal-footer jostify-content-end">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-primary">Agregar</button>
            </div>

        </div>

    </div>
</div>
<!--DINAL MODAL-->

<script>
    $(document).ready(function() {
        let accion = "";

        let Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        let table = $("#tablaProductos").DataTable({
            "ajax": {
                "url": "ajax/producto.ajax.php",
                "type": "POST",
                "dataSrc": ""
            },
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            },
            "lengthMenu": [
                [3, 5, -1],
                [3, 5, "Todos"]
            ],

            "columnDefs": [{
                "targets": 7,
                "sortable": false,
                "render": function(data, type, full, meta) {
                    return "<div style='display:flex;'>" +
                        "<button style='margin-right: 15px' type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-actualizar-producto'>" + "<i class='fas fa-pencil-alt'></i>" +
                        "</button>" +
                        "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " + "<i class='fas fa-trash'></i>" +
                        "</button>" +
                        "</div>";
                }

            }],
            "columns": [{
                    "data": "codigo"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "precio"
                },

                {
                    "data": "cantidad"
                },

                {
                    "data": "estado"
                },
                {
                    "data": "categoria_id"
                },

                {
                    "data": "imagen"
                },
                {
                    "data": "acciones"
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                // Añade una clase CSS basada en el valor de la columna "rol"
                if (data.estado === "Activo") {
                    $(row).find('td:eq(5)').addClass('activo-color');
                } else if (data.estado === "Inactivo") {
                    $(row).find('td:eq(5)').addClass('inactivo-color');
                }
            },
        });


        $("btn-agregar-producto").on("click", () => {
            accion = "registrar"
        })



        // GUARDAR LA INFORMACION DEL PRODUCTO DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click', function() {


            let id = $("#idProducto").val();
            nombre = $("#nombreP").val(),
                precio = $("#precioP").val(),
                descripcion = $("#descripcionP").val(),
                estado = $("#estadoP").val(),
                categoria = $("#categoriaP").val(),
                cantidad = $("#cantidadP").val(),
                img = $("#imagenP").val()
                imagen = `<img src="${img} " style="border-radius: 10px" alt='' width="150"/>` 

            let datos = new FormData();

            datos.append('codigo', id);
            datos.append('nombre', nombre);
            datos.append('precio', precio);
            datos.append('descripcion', descripcion);
            datos.append('estado', estado);
            datos.append('categoria', categoria);
            datos.append('cantidad', cantidad);
            datos.append('imagen', imagen);
            datos.append('accion', accion);

            console.log("Contenido de FormData:");
            for (let pair of datos.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            Swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Está seguro que desea registrar el producto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sí, Registrar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {

                if (resultado.value) {


                    $.ajax({
                        url: "ajax/producto.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log(respuesta);
                            $("#modal-actualizar-producto").modal('hide');
                            table.ajax.reload(null, false);

                            $("#idProducto").val("");
                            $("#nombreP").val("");
                            $("#precioP").val("");
                            $("#descripcionP").val("");
                            $("#estadoP").val("");
                            $("#cantidadP").val("");
                            $("#imagenP").val("");
                            $("#categoriaP").val("");

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })

                        }
                    })

                } else {

                }
            })



        })
        // ACTUALIZAR UN PRODUCTO

        $("#tablaProductos tbody").on('click', '.btnEditar', function() {



            let data = table.row($(this).parents('tr')).data();
            accion = "actualizar";
            $("#idProducto").val(data[0]);
            $("#nombreP").val(data[1]);
            $("#precioP").val(data[2]);
            $("#descripcionP").val(data[3]);
            $("#cantidadP").val(data[4]);
            $("#estadoP").val(data[5]);
            $("#categoriaP").val(data[6]);
            $("#imagenP").val(data[6]);


        })

        // ELIMINAR UN PRODUCTO
        $("#tablaProductos tbody").on('click', '.btnEliminar', function() {
            let data = table.row($(this).parents('tr')).data();

            let id = data.codigo

            let datos = new FormData();
            datos.append('accion', 'eliminar')
            datos.append('codigo', id);

            Swal.fire({
                title: 'CONFIRMACION',
                text: "¿Está seguro de eliminar el registro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {

                    // LLAMADO AJAX
                    $.ajax({
                        url: "ajax/producto.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log(respuesta);
                            console.log(respuesta)
                            table.ajax.reload(null, false);

                            Toast.fire({
                                icon: 'success',
                                title: 'Confirmacion',
                                text: 'El producto fue eliminado con exito',
                                confirmButtonText: "Cerrar"
                            })

                        }
                    })
                } else {
                    // alert("no se modifico el producto??")
                }
            })
        })

    })
</script>