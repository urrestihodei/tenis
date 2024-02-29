<?php
    include 'konexioa.php';

    // Verifica si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtén el usuario y contraseña del formulario
        $erabiltzailea = $_POST['erabiltzailea'];
        $pasahitza = $_POST['pasahitza'];

        // Consulta para verificar las credenciales del usuario
        $sql = "SELECT * FROM jokalaria WHERE erabiltzailea = '$erabiltzailea' AND pasahitza = '$pasahitza'";

        $result = $conn->query($sql);

        // Verifica si se encontró un usuario con las credenciales proporcionadas
        if ($result->num_rows > 0) {
            // Cambia el estado de "aktibo" a 0 para el usuario en la base de datos
            $update_sql = "UPDATE jokalaria SET aktibo = 0 WHERE erabiltzailea = '$erabiltzailea'";
            if ($conn->query($update_sql) === TRUE) {
                header("Location: baja.php?success=true");
                exit;
            } else {
                echo "Errorea: " . $conn->error;
            }
        } else {
            // Credenciales incorrectas
            $error = "Erabiltzaile edo pasahitza okerra.";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

    <h2>Error: Acceso no autorizado</h2>
    <p>Por favor, inicia sesión para acceder a esta página.</p>

</body>
</html>
