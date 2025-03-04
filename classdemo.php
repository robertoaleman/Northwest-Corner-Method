<!DOCTYPE html>
<html>
<head>
    <title>Northwest Corner Method by Roberto Aleman, ventics.com</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>
</head>
<body style="
    padding: 1em;
">
    <h1>Northwest Corner Method</h1>
    Credits to <a href="https://ventics.com">Roberto Aleman, ventics.com</a>

    <div id="input-data">
        <h2>Enter Data:</h2>
        <form id="northwestForm" method="post" action="">
            <label for="oferta">Plant Capacity (separated by commas):</label>
            <input type="text" id="oferta" name="oferta" value="80, 30, 60, 45"><br><br>
            <label for="demanda">Warehouse Requirements (separated by commas):</label>
            <input type="text" id="demanda" name="demanda" value="70, 40, 70, 35"><br><br>
            <label for="costos">Transportation Costs (comma-separated rows):</label><br>
            <textarea id="costos" name="costos" rows="4" cols="30">
5,2,7,3
3,6,6,1
6,1,2,4
4,3,6,6</textarea><br><br>
            <button type="submit">Calculate</button>
        </form>
    </div>

    <div id="resultados">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'northwestcornermethod.php'; // Include your class file

            $oferta_str = $_POST['oferta'];
            $demanda_str = $_POST['demanda'];
            $costos_str = $_POST['costos'];

            $northwest = new NorthwestCornerMethod($oferta_str, $demanda_str, $costos_str);
            $northwest->solve();
            echo $northwest->getResultados();
        }
        ?>
    </div>

    <script src="script.js"></script>

    Credits to <a href="https://ventics.com">Roberto Aleman, ventics.com</a>

</body>
</html>