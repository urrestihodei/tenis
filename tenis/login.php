<?php
$host = "tu_servidor_mysql";
$usuario = "tu_usuario_mysql";
$contraseña = "tu_contraseña_mysql";
$base_de_datos = "nombre_de_tu_base_de_datos";

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contraseña = password_hash($_POST["contraseña"], PASSWORD_BCRYPT);

    $consulta = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES ('$nombre_usuario', '$contraseña')";

    if (mysqli_query($conexion, $consulta)) {
        echo "¡Registro exitoso!";
    } else {
        echo "Error en el registro: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 20px;
            text-align: center;
        }
        h2 {
            color: #0066cc;
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
            background-color: #0066cc;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>

    <h2>Registro de Usuario</h2>

    <form method="post" action="">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>

        <input type="submit" value="Registrarse">
    </form>

</body>
</html>
