<?php


/*
   Credits to Roberto Aleman, ventics.com

You are free to use the code and modify it, but you must keep the credit link to the creator each time you use it.
The code is delivered as is, you are free to place the necessary  to implement it */


$oferta = explode(',', $_POST['oferta']);
$demanda = explode(',', $_POST['demanda']);
$costos_str = explode("\n", $_POST['costos']);
$costos = [];
foreach ($costos_str as $row) {
    $costos[] = explode(',', trim($row));
}

$solucion = [];
$resultados = "<h2>Step-by-step solution:</h2>";

$i = 0;
$j = 0;
$costo_total = 0;

$resultados .= "<table>";
$resultados .= "<tr><th>Variable Activity</th><th>Cost Per Unit</th><th>Distribution Cost</th></tr>";

while ($i < count($oferta) && $j < count($demanda)) {
    $cantidad = min($oferta[$i], $demanda[$j]);
    $solucion[$i][$j] = $cantidad;

    $costo_unitario = $costos[$i][$j];
    $costo_distribucion = $cantidad * $costo_unitario;
    $costo_total += $costo_distribucion;

    $resultados .= "<tr><td>Plant " . chr(65 + $i) . " to Warehouse " . ($j + 1) . " ($cantidad units)</td><td>$costo_unitario</td><td>$costo_distribucion</td></tr>";

    $oferta[$i] -= $cantidad;
    $demanda[$j] -= $cantidad;

    if ($oferta[$i] == 0) {
        $i++;
    } else {
        $j++;
    }
}

$resultados .= "<tr><td colspan='2'><strong>Total Distribution Cost:</strong></td><td><strong>$costo_total</strong></td></tr>";
$resultados .= "</table>";

$resultados .= "<h2>Solution table:</h2>";
$resultados .= "<table>";
$resultados .= "<tr><th></th><th>Warehouse 1</th><th>Warehouse 2</th><th>Warehouse 3</th><th>Warehouse 4</th></tr>";

for ($i = 0; $i < count($oferta); $i++) {
    $resultados .= "<tr><th>Plant " . chr(65 + $i) . "</th>";
    for ($j = 0; $j < count($demanda); $j++) {
        $resultados .= "<td>" . (isset($solucion[$i][$j]) ? $solucion[$i][$j] : 0) . "</td>";
    }
    $resultados .= "</tr>";
}

$resultados .= "</table>";

echo $resultados;
?>