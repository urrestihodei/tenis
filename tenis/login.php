<?php

// Incluir el archivo de conexión a la base de datos
include 'konexioa.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $erabiltzaile_izena = $_POST["erabiltzaile_izena"];
    $pasahitza = $_POST["pasahitza"];

    // Preparar la consulta SQL (utilizando consultas preparadas para evitar inyección SQL)
    $sql = "SELECT * FROM jokalaria WHERE erabiltzailea = ? AND pasahitza = ? AND aktibo = 1";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("ss", $erabiltzaile_izena, $pasahitza);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario
    if ($result->num_rows == 1) {
        // Usuario autenticado correctamente
        $_SESSION["erabiltzaile_izena"] = $erabiltzaile_izena;
        header("Location: perfila.php"); // Redirigir a la página de perfil
        exit(); // Finalizar el script para evitar que se siga ejecutando
    } else {
        $error = "Erabiltzailea edo pasahitza okerrak dira.";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesioa Hasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 20px;
            text-align: center;
        }
        h2 {
            color: #000;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #000;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 0;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #005bb5;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        nav {
            /* background-color: #666; */
            background: "img/tierra.png";
            padding: 0.5em;
            text-align: center;
        }

        nav a {
            color: #000000;
            text-decoration: none;
            padding: 0.5em 1em;
            margin: 0 0.5em;
            border-radius: 3px;
            transition: background-color 0.3s;
            display: inline-block;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #f0e9e9;
        }
    </style>
</head>
<body>

    <h2>Sesioa Hasi</h2>
    <nav>
        <a href="index.html">Hasiera</a>
        <a href="torneoa.php">Txapelketak eta Emaitzak</a>
        <a href="jokalariak.php">Jokalariak</a>
        <a href="informazioa.php">Informazioa</a>
        <a href="kluba.php">Kluba</a>
        <a href="baja.php">Baja eman</a>
    </nav>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Formulario para iniciar sesión -->
        <label for="erabiltzaile_izena">Erabiltzailea:</label>
        <input type="text" name="erabiltzaile_izena" required>

        <label for="pasahitza">Pasahitza:</label>
        <input type="password" name="pasahitza" required>

        <input type="submit" value="Sesioa Hasi">
    </form>

    <form action="erregistroa.php" method="GET">
        <!-- Botón para registrarse -->
        <input type="submit" value="Erregistratu">
    </form>

    <?php if (isset($error)) : ?>
        <!-- Mostrar mensaje de error -->
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

</body>
</html>
