<!-- CONTENT HEADER -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row md-2">
            <div class="col-sm-6">
                <h1>Administrar Productos</h1>
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
<section class="content">
    <div class="container-fluid">
        <div class="btn-agregar-producto">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-tager="#modal-actualizar-producto" data-dismiss="modal"><i class="fas da-plu-squre"></i>
                Agregar Producto </button>
        </div>

        <table id="tablaProductos" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col-3">Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>

</section>

<script>
    $(document).ready(function() {

        let table = $("#tablaProductos").DataTable({
            "ajax": {
                "url": "ajax/producto.ajax.php",
                "type": "POST",
                "dataSrc": ""


            },"columnDefs": [{
                "targets": 5,
                "sortable": false,
                "render": function(data, type, full, meta) {
                    return "<center>" +
                        "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='modal-actualizar-categoria'>" + "<i class='fas fa-pencil-alt'></i>" +
                        "</button>" +
                        "<button type='button' class='btn btn-danger btn-sm btnEliminar'>" + "<i class='fas fa-trash'></i>" +
                        "</button>" +
                        "</center>";
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
                    "data": "descripcion"
                },
                {
                    "data": "imagen"
                },
                {
                    "data": "acciones"
                }
            ],
            
        });
    })

</script>