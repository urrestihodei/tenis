<?php

include 'konexioa.php';

if (isset($_SESSION['erabiltzailea'])) {
    $erabiltzaileak = $_SESSION['erabiltzailea'];
}

$jokalariak = "SELECT * FROM jokalaria";

$result = $conn->query($jokalariak);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Jokalariak</title>
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
    <h1>Jokalariak</h1>

    <nav>
        <a href="index.html">Hasiera</a>
        <a href="torneoa.php">Txapelketak eta Emaitzak</a>
        <a href="informazioa.php">Informazioa</a>
        <a href="kluba.php">Kluba</a>
        <a href="login.php">Saioa Hasi</a>
        <a href="baja.php">Baja eman</a>
    </nav>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>IZENA</th>
                    <th>ABIZENA</th>
                    <th>JAIOTZE DATA</th>
                    <th>HERRIALDEA</th>
                    <th>TITULOAK</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>    
                    <td>" . $row["izena"] . "</td>
                    <td>" . $row["abizena"] . "</td>
                    <td>" . $row["jaiotze_data"] . "</td>
                    <td>" . $row["herria"] . "</td>
                    <td>" . $row["tituluak"] . "</td>
                </tr>";
        }

        echo "</table>";
    }
    ?>

</body>

</html>
