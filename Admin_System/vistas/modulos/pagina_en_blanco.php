<style>
    .card {
        background-color: #fff !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
        border-radius: 8px !important;
        overflow: hidden !important;
        margin: 1rem !important;
        width: 300px !important;

    }

    .card:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;

    }


    .card-header {
        background-color: #333 !important;
        color: #fff !important;
        padding: 1rem !important;
        text-align: center !important;
        font-size: 20px;
    }

    .card-body {
        padding: 1rem !important;
    }

    .fa-users {
        font-size: 24px;
        margin-right: 5px;
    }

    .cantidad {
        font-size: 20px;
        font-weight: 500;
        position: end;
    }


    /* Estilos para la tarjeta */
    .tarjeta {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 20px;
    }

    /* Estilos para el encabezado de la tarjeta */
    .card-header {
        background-color: #007BFF;
        color: #fff;
        padding: 10px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Estilos para la fila */
    .row {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 20px;
    }

    /* Estilos para la columna */
    .col {
        flex: 1;
    }

    /* Estilos para el contenedor del canvas */
    .container-canvas {
        max-width: 100%;
    }

    /* Estilos específicos para el canvas con ID "myChart" */
    #myChart {
        width: 100%;
        height: auto;
    }
</style>


<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Estadisticas de Compras</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        Estadisticas de Compras
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Card con información dinámica -->
            <div class="card">
                <div class="card-header">Usuarios <i class="fas fa-users"></i></div>
                <div class="card-body">
                    <p id="cantidad-usuarios" class="cantidad">Cargando...</p>
                </div>
            </div>

            <!-- Otras tarjetas (sin información dinámica en este ejemplo) -->
            <div class="card">
                <div class="card-header">Productos <i class="fas fa-tag"></i></div>
                <div class="card-body">
                    <p id="cantidad-productos" class="cantidad">Cargando...</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Ventas <i class="fas fa-shopping-bag"></i> </div>
                <div class="card-body">
                    <p id="cantidad-ventas" class="cantidad">Cargando...</p>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Gráfico de Barras -->
        <div class="tarjeta" style="width: 100%;">
            <div class="card-header">Productos - Cantidad</div>
            <div class="card-body">
                <div class="contenedor-canvas"><canvas id="barChart"></canvas></div>
            </div>
        </div>

        <!-- Gráfico Circular -->
        <div class="tarjeta" style="width: 100%;">
            <div class="card-header">Productos más vendidos - Cantidad</div>
            <div class="card-body">
                <div class="contenedor-canvas"><canvas id="pieChart"></canvas></div>
            </div>
        </div>
    </div>
</div>

</section>