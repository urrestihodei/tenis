<?php
include 'konexioa.php';

$erabiltzaileak = $_SESSION['erabiltzailea'];

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
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>IZENA</th>
                    <th>ABIZENA</th>
                    <th>DATA</th>
                    <th>IRAUPENA (min)</th>
                    <th>FALTAK</th>
                    <th>JOKUAK</th>
                    
                </tr>";

        do {
            echo "<tr>    
                    <td>" . $row["izena"] . "</td>
                    <td>" . $row["abizena"] . "</td>
                    <td>" . $row["data"] . "</td>
                    <td>" . $row["iraupena"] . "</td>
                    <td>" . $row["faltak"] . "</td>
                    <td>" . $row["jokua_emaitza"] . "</td>
                </tr>"
                ;
        } while ($row = $result->fetch_assoc());

        echo "</table>";
    } else {
        echo "<p>Ez dago torneo honetan emaitzarik.</p>";
    }
    ?>
</body>

</html>
