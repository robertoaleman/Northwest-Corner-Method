<?php

class NorthwestCornerMethod {
    private $oferta;
    private $demanda;
    private $costos;
    private $solucion;
    private $resultados;
    private $costo_total;

    public function __construct($oferta_str, $demanda_str, $costos_str) {
        $this->oferta = explode(',', $oferta_str);
        $this->demanda = explode(',', $demanda_str);
        $this->costos = $this->parseCostos($costos_str);
        $this->solucion = [];
        $this->resultados = "<h2>Step-by-step solution:</h2>";
        $this->costo_total = 0;
    }

    private function parseCostos($costos_str) {
        $costos = [];
        $costos_rows = explode("\n", $costos_str);
        foreach ($costos_rows as $row) {
            $costos[] = explode(',', trim($row));
        }
        return $costos;
    }

    public function solve() {
        $i = 0;
        $j = 0;

        $this->resultados .= "<table>";
        $this->resultados .= "<tr><th>Variable Activity</th><th>Cost Per Unit</th><th>Distribution Cost</th></tr>";

        while ($i < count($this->oferta) && $j < count($this->demanda)) {
            $cantidad = min($this->oferta[$i], $this->demanda[$j]);
            $this->solucion[$i][$j] = $cantidad;

            $costo_unitario = $this->costos[$i][$j];
            $costo_distribucion = $cantidad * $costo_unitario;
            $this->costo_total += $costo_distribucion;

            $this->resultados .= "<tr><td>Plant " . chr(65 + $i) . " to Warehouse " . ($j + 1) . " ($cantidad units)</td><td>$costo_unitario</td><td>$costo_distribucion</td></tr>";

            $this->oferta[$i] -= $cantidad;
            $this->demanda[$j] -= $cantidad;

            if ($this->oferta[$i] == 0) {
                $i++;
            } else {
                $j++;
            }
        }

        $this->resultados .= "<tr><td colspan='2'><strong>Total Distribution Cost:</strong></td><td><strong>{$this->costo_total}</strong></td></tr>";
        $this->resultados .= "</table>";

        $this->resultados .= "<h2>Solution table:</h2>";
        $this->resultados .= "<table>";
        $this->resultados .= "<tr><th></th><th>Warehouse 1</th><th>Warehouse 2</th><th>Warehouse 3</th><th>Warehouse 4</th></tr>";

        for ($i = 0; $i < count($this->oferta); $i++) {
            $this->resultados .= "<tr><th>Plant " . chr(65 + $i) . "</th>";
            for ($j = 0; $j < count($this->demanda); $j++) {
                $this->resultados .= "<td>" . (isset($this->solucion[$i][$j]) ? $this->solucion[$i][$j] : 0) . "</td>";
            }
            $this->resultados .= "</tr>";
        }

        $this->resultados .= "</table>";
    }

    public function getResultados() {
        return $this->resultados;
    }
}

// Example usage (assuming you have POST data):
if (isset($_POST['oferta']) && isset($_POST['demanda']) && isset($_POST['costos'])) {
    $oferta_str = $_POST['oferta'];
    $demanda_str = $_POST['demanda'];
    $costos_str = $_POST['costos'];

    $northwest = new NorthwestCornerMethod($oferta_str, $demanda_str, $costos_str);
    $northwest->solve();
    echo $northwest->getResultados();
}
?>