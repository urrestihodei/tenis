<?php
include 'konexioa.php';

$erabiltzaileak = $_SESSION['erabiltzailea'];

$jokalariak = "SELECT * FROM jokalariak";

$result = $conn->query($jokalariak);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1>Jokalariak</h1>

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
                    <td>" . $row["herrialdea"] . "</td>
                    <td>" . $row["tituloak"] . "</td>
                </tr>";
        }

        echo "</table>";
    }
    ?>

</body>

</html>
