<?php

include 'konexioa.php';

if (isset($_SESSION['erabiltzailea'])) {
    $erabiltzaileak = $_SESSION['erabiltzailea'];
}

$torneoId = $_GET['torneo_id'];

$emaitzak = "SELECT * FROM jokalaria 
                        JOIN jolastu ON jokalaria.nan = jolastu.jokalaria_nan
                        JOIN partidua ON partidua.p_kodea = jolastu.partidua_kodea
                        JOIN torneoa ON partidua.torneoa_kodea = torneoa.t_kodea
                        WHERE t_kodea='$torneoId'";

$result = $conn->query($emaitzak);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $torneoIzena = $row["t_izena"];
} else {
    $torneoIzena = "Hutsa";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Emaitzak</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 20px;
            text-align: center;
        }

        h1, h2 {
            color: #000;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #000;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Emaitzak </h1>

    <nav>
        <a href="index.html">Hasiera</a>
        <a href="torneoa.php">Txapelketak eta Emaitzak</a>
        <a href="jokalariak.php">Jokalariak</a>
        <a href="informazioa.php">Informazioa</a>
        <a href="kluba.php">Kluba</a>
        <a href="login.php">Saioa Hasi</a>
        <a href="baja.php">Baja eman</a>
    </nav>

    <br>
    <h2>Torneoa: <?php echo $torneoIzena; ?></h2>

    <?php
// SQL kontsulta datuak lortzeko
$sql = "SELECT partidua.p_kodea, partidua.data, jolastu.iraupena, jolastu.faltak, jolastu.jokua_emaitza, jolastu.taldea, 
        jokalaria.izena AS jokalaria_izena, jokalaria.abizena AS jokalaria_abizena, 
        arbitroa.a_izena AS arbitroa_izena, arbitroa.a_abizena AS arbitroa_abizena
        FROM partidua
        JOIN jolastu ON partidua.p_kodea = jolastu.partidua_kodea
        JOIN jokalaria ON jolastu.jokalaria_nan = jokalaria.nan
        JOIN arbitroa ON partidua.arbitroa_nan = arbitroa.nan
        WHERE partidua.torneoa_kodea = '$torneoId'
        ORDER BY partidua.p_kodea, jolastu.taldea"; // Partiduko kodearen eta taldearen arabera ordenatzendu

$result = $conn->query($sql);

//Bikoteak gordetzeko array-a
$bikoteak = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        $p_kodea = $row["p_kodea"];
        
        
        if (!isset($bikoteak[$p_kodea])) {
            $bikoteak[$p_kodea] = array();
        }

        
        $bikoteak[$p_kodea][] = $row;
    }

    
    foreach ($bikoteak as $p_kodea => $bikotea) {
        //Partiduko informazioa
        echo "<h2>Partidu Data: " . $bikotea[0]["data"] . " - Iraupena(min): " . $bikotea[0]["iraupena"] . " - Epailea: " . $bikotea[0]["arbitroa_izena"] . " " . $bikotea[0]["arbitroa_abizena"] . "</h2>";

        
        echo "<table border='1'>";
        echo "<tr>
                <th>Jokalaria</th>
                <th>Faltak</th>
                <th>Emaitza</th>              
            </tr>";

       
        foreach ($bikotea as $jokalaria) {
            echo "<tr>";
            echo "<td>". $jokalaria["taldea"] . " " . $jokalaria["jokalaria_izena"] . " " . $jokalaria["jokalaria_abizena"] . "</td>";
            echo "<td>" . $jokalaria["faltak"] . "</td>";
            echo "<td>" . $jokalaria["jokua_emaitza"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
} else {
    echo "Ez daude partiduak.";
}
?>




</body>

</html>
