<!-- CONTENT HEADER -->

<section class="content-header">
    <style>
        .admin-color {
            background-color: #ed7855;
        }

        .supervisor-color {
            background-color: #ffa477;
            /* Color para supervisores */
        }
    </style>
    <div class="container-fluid">
        <div class="row md-2">
            <div class="col-sm-6">
                <h1>Administrar Empleados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio / </a></li>
                    <li class="Breadcrumb-item active">Gestor de empleados</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- /. CONRENT HEADER-->
<!--  Content-->
<section class="container-fluid">

    <div class="btn-agregar-empleado btn-agregar">

        <button style='margin-left:20px;' type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-actualizar-empleados" data-dismiss="modal">
            Usuario <i class="fas fa-user-plus"></i>
        </button>
    </div>
    <br>
    <table id="tablaEmpleados" class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Contraseña</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</section>
<!-- ./Content -->

<!-- ventana modal para registro y actualizacion -->

<div class="modal fade" id="modal-actualizar-empleados">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!---===============
        MODAL HEADER
        ========================--->
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Agregar Usuario <i class="fas fa-user-plus"></i></h4>
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
                            <input type="hidden" name="ids" id="id" value="">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="user">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="user">
                    </div>
                    <div class="col-sm-4">
                        <label for="user">Rol</label>
                        <select class="form-control select2bs4" name="rol" id="textRol">
                            <option value="Administrador">Administrador</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="pasword">Contraseña</label>
                        <input type="text" class="form-control" name="imagen" id="pasword">
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

        let table = $("#tablaEmpleados").DataTable({
            "ajax": {
                "url": "ajax/empleados.ajax.php",
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
            "columnDefs": [{
                "targets": 5,
                "sortable": false,
                "render": function(data, type, full, meta) {
                    return "<center>" +
                        "<button style='margin-left:20px; margin-right:10px' type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-actualizar-empleados'>" +
                        "<i class='fas fa-pencil-alt'></i>" +
                        "</button>" +
                        "<button type='button' class='btn btn-danger btn-sm btnEliminar'>" +
                        "<i class='fas fa-trash'></i>" +
                        "</button>" +
                        "</center>";
                }

            }],
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "contra"
                },
                {
                    "data": "usuario"
                },
                {
                    "data": "rol"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "Acciones"
                },

            ],
            "createdRow": function(row, data, dataIndex) {
                // Añade una clase CSS basada en el valor de la columna "rol"
                if (data.rol === "Administrador") {
                    $(row).find('td:eq(3)').addClass('admin-color');
                } else if (data.rol === "Supervisor") {
                    $(row).find('td:eq(3)').addClass('supervisor-color');
                }
            },

        });


        // ACTUALIZAR LA INFORMACION DEL USUARIO DESDE LA VENTANA MODAL

        $(".btn-agregar-empleado").on('click', function() {
            accion = "registrar"
        })

        $("#tablaEmpleados tbody").on('click', '.btnEditar', function() {

            let data = table.row($(this).parents('tr')).data();
            accion = "actualizar";
            $("#id").val(data[0])
            $("#pasword").val(data[1]);
            $("#user").val(data[2]);
            $("#textRol").val(data[3]);
            $("#name").val(data[4]);

        })


        // GUARDAR LA INFORMACION DEL USUARIO DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click', function() {
            let id = $("#id").val();

            nombre = $("#name").val(),
                usuario = $("#user").val(),
                rol = $("#textRol").val(),
                password = $("#pasword").val()
            let datos = new FormData();

            datos.append('id', id)
            datos.append('nombre', nombre)
            datos.append('user', usuario)
            datos.append('rol', rol)
            datos.append('contra', password)
            datos.append('accion', accion)

            Swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Está seguro que desea registrar el siguente usuario?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sí, Registrar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: "ajax/empleados.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            //console.log(respuesta);
                            $("#modal-actualizar-empleados").modal('hide');
                            table.ajax.reload(null, false);
                            console.log(respuesta);
                            $("#name").val("");
                            $("#user").val("");
                            $("#pasword").val("");

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })

                        }
                    })
                }
            })

        })

        // ELIMINAR UN PRODUCTO
        $("#tablaEmpleados tbody").on('click', '.btnEliminar', function() {
            let data = table.row($(this).parents('tr')).data();

            let id = data["id"];

            let datos = new FormData();
            datos.append('accion', 'eliminar')
            datos.append('id', id);

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
                        url: "ajax/empleados.ajax.php",
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
                                text: respuesta,
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