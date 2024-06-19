<?php
require '../modelo/modelo_grafico.php';


$mg = new Modelo_Grafico();

// Obtener datos para el gráfico de barras
$datosBar = $mg->TraerDatosGraficosBar();

// Obtener datos para el gráfico circular
$datosCircule = $mg->TraerDatosGraficosCircule();

$conteoUser = $mg->CantidadUsuariosCard();
$conteoVenta = $mg->CantidadVentasCard();

$conteoProducts = $mg->CantidadproductosCard();
// Combinar ambos conjuntos de datos en un solo array asociativo
$resultado = array(
    'grafico_bar' => $datosBar,
    'grafico_circular' => $datosCircule,
    'dataUser' => $conteoUser,
    'dataProducts' => $conteoProducts,
    'dataVenta' => $conteoVenta,
);

// Codificar el array combinado como JSON y devolverlo
echo json_encode($resultado);