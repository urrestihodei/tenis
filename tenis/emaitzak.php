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
  
  $sql = "SELECT partidua.p_kodea, partidua.data, jolastu.iraupena, jolastu.faltak, jolastu.jokua_emaitza, jolastu.taldea, 
  jokalaria.izena AS jokalaria_izena, jokalaria.abizena AS jokalaria_abizena, 
  arbitroa.a_izena AS arbitroa_izena, arbitroa.a_abizena AS arbitroa_abizena
  FROM partidua
  JOIN jolastu ON partidua.p_kodea = jolastu.partidua_kodea
  JOIN jokalaria ON jolastu.jokalaria_nan = jokalaria.nan
  JOIN arbitroa ON partidua.arbitroa_nan = arbitroa.nan
  WHERE partidua.torneoa_kodea = '$torneoId'
  ORDER BY partidua.p_kodea";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $current_p_kodea = null;

    echo "<table border='1'>";
    echo "<tr>
            <th>Izena Abizenak</th>
            <th>Emaitza</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        if ($row["p_kodea"] != $current_p_kodea) {
            if ($current_p_kodea !== null) {
                echo "<td></td></tr>";
            }
            $tennisa1 = $row["taldea"] . " " . $row["jokalaria_izena"] . " " . $row["jokalaria_abizena"];
            $result1 = $row["jokua_emaitza"];

            echo "<tr>
                    <td>$tennisa1</td>
                    <td>$result1</td>
                </tr>";

            $current_p_kodea = $row["p_kodea"];
        } else {
            $tennisa2 = $row["taldea"] . " " . $row["jokalaria_izena"] . " " . $row["jokalaria_abizena"];
            $result2 = $row["jokua_emaitza"];

            echo "<tr>
                    <td>$tennisa2</td>
                    <td>$result2</td>
                </tr>";
        }
    }

    echo "</table>";
} else {
    echo "Ez daude partiduak.";
}


?>
</body>

</html>
