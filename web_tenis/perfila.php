<?php

include 'konexioa.php';

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!isset($_SESSION['erabiltzaile_izena'])) {
    header("Location: login.php");
    exit();
}

$erabiltzailea = $_SESSION['erabiltzaile_izena'];

$sql = "SELECT * FROM jokalaria WHERE erabiltzailea = '$erabiltzailea'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfila</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #343a40;
            margin-bottom: 40px;
            font-size: 36px;
        }

        p {
            color: #000;
            margin: 20px 0;
            font-size: 22px;
        }

        strong {
            color: #000;
            font-size: 24px;
        }
    </style>
</head>
<body>
   
<div class="container">
        <h1>Zure Perfila</h1>
        <p><strong>Izena:</strong> <?php echo $row['izena']; ?></p>
        <p><strong>Abizena:</strong> <?php echo $row['abizena']; ?></p>
        <p><strong>Herria:</strong> <?php echo $row['herria']; ?></p>
        <p><strong>Jaiotze Data:</strong> <?php echo $row['jaiotze_data']; ?></p>
        <p><strong>Tituluak:</strong> <?php echo $row['tituluak']; ?></p>
    </div>
</body>
</html>
<?php
} else {
    echo "Ez da informazioa aurkitu";
}
?>