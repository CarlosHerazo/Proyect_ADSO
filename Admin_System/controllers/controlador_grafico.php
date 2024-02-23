<?php
require '../modelo/modelo_grafico.php';
$mg = new Modelo_Grafico();
$consulta = $mg->TraerDatosGraficosBar();
echo json_encode($consulta);
