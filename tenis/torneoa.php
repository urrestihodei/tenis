<?php
include 'konexioa.php';

if (isset($_SESSION['erabiltzailea'])) {
    $erabiltzaileak = $_SESSION['erabiltzailea'];
}

$emaitzak = "SELECT * FROM torneoa ORDER BY hasiera_data";

$result = $conn->query($emaitzak);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Txapelketak</title>
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #e44d26;
            color: #fff;
            border: 2px solid #e44d26;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #d7391e;
        }
    </style>
</head>

<body>
    <h1>Txapelketak</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>TORNEOA</th>
                    <th>HASIERA</th>
                    <th>BUKAERA</th>
                    <th>MOTA</th>
                    <th>LUR MOTA</th>
                    <th>EMAITZAK</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>    
                    <td>" . $row["t_izena"] . "</td>
                    <td>" . $row["hasiera_data"] . "</td>
                    <td>" . $row["amaiera_data"] . "</td>
                    <td>" . $row["mota"] . "</td>
                    <td>" . $row["lur_mota"] . "</td>
                    <td><a class='button' href='emaitzak.php?torneo_id=" . $row["t_kodea"] . "'>Emaitzak Ikusi</a></td>
                </tr>";
        }

        echo "</table>";
    }
    ?>

</body>

</html>
