<?php

include 'konexioa.php';

if (isset($_SESSION['erabiltzailea'])) {
    $erabiltzaileak = $_SESSION['erabiltzailea'];
}

$torneoId = $_GET['torneo_id'];

$emaitzak = "SELECT * FROM jokalaria 
                        JOIN jolastu ON jokalaria.nan = jolastu.jokalaria_nan
                        JOIN partidua ON partidua.p_kodea = jolastu.partidua_p_kodea
                        JOIN torneoa ON partidua.torneoa_kodea = torneoa.t_kodea
                        WHERE t_kodea='$torneoId'";

$result = $conn->query($emaitzak);

// Obtén el nombre del torneo
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $torneoNombre = $row["t_izena"];
} else {
    $torneoNombre = "Hutsa";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: #0066cc;
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
            background-color: #0066cc;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Emaitzak </h1>
    <h2>Torneoa: <?php echo $torneoNombre; ?></h2>

    <?php
  

// Consulta para obtener todos los partidos con detalles de jugadores y árbitros
$sql = "SELECT partidua.p_kodea, partidua.data, partidua.iraupena, jolastu.faltak, jolastu.jokua_emaitza, jolastu.taldea, 
        jokalaria.izena AS jokalaria_izena, jokalaria.abizena AS jokalaria_abizena, 
        arbitroa.a_izena AS arbitroa_izena, arbitroa.a_abizena AS arbitroa_abizena
        FROM partidua
        JOIN jolastu ON partidua.p_kodea = jolastu.partidua_p_kodea
        JOIN jokalaria ON jolastu.jokalaria_nan = jokalaria.nan
        JOIN arbitroa ON partidua.arbitroa_nan = arbitroa.nan
        ORDER BY partidua.p_kodea"; // Ordenar por código de partido


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $current_p_kodea = null; // Variable para controlar el código de partido actual
    // Mostrar cada partido en una tabla HTML
    while($row = $result->fetch_assoc()) {
        if ($row["p_kodea"] != $current_p_kodea) {
            // Si el código de partido es diferente al anterior, comenzamos una nueva tabla
            if ($current_p_kodea !== null) {
                // Cerramos la tabla actual
                echo "</table>";
            }
            echo "<h2>Partidu Data: " . $row["data"] . " - Iraupena(min): " . $row["iraupena"] . " - Epailea: " . $row["arbitroa_izena"] . " " . $row["arbitroa_abizena"] . "</h2>"; // Mostramos el título del partido
            // Abrimos una nueva tabla
            echo "<table border='1'>";
            // Creamos una fila para la fecha, duración y árbitro
            echo "<tr>
                    <th>1</th>
                    <th>Faltak</th>
                    <th>Emaitza 1</th>
                    <th>Emaitza 2</th>
                    <th>Faltak</th>
                    <th>2</th>               
                </tr>";
            // Guardamos el nuevo código de partido como el actual
            $current_p_kodea = $row["p_kodea"];
        }
        // Creamos una fila para los detalles del jugador
        echo "<tr>";
        // Mostramos los detalles del jugador del equipo 1
        if ($row["taldea"] == 1) {
            echo "<td>" . $row["jokalaria_izena"] . " " . $row["jokalaria_abizena"] . "</td>";
            echo "<td>" . $row["faltak"] . "</td>";
            echo "<td>" . $row["jokua_emaitza"] . "</td>";
            // Obtener los detalles del jugador del equipo 2 para este partido
            if ($row2 = $result->fetch_assoc()) {
                echo "<td>" . $row2["jokua_emaitza"] . "</td>";
                echo "<td>" . $row2["faltak"] . "</td>";
                echo "<td>" . $row2["jokalaria_izena"] . " " . $row2["jokalaria_abizena"] . "</td>";
            } else {
                // Si no hay un segundo jugador disponible, mostrar celdas vacías
                echo    "<td>$jok_emaitza2</td>
                        <td>$jok_faltak2</td>
                        <td>$jok_izena2</td>";
            }
        }
        else {
            $jok_izena2 =  $row["jokalaria_izena"] . " " . $row["jokalaria_abizena"];
            $jok_faltak2 = $row["faltak"];
            $jok_emaitza2 = $row["jokua_emaitza"];
        }
        echo "</tr>";
    }
    // Cerramos la última tabla
    echo "</table>";
} else {
    echo "No se encontraron partidos.";
}

?>
</body>

</html>