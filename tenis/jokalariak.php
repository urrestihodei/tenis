<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokalariak</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Jokalariak</h1>

    <?php
    // Datos simulados de jugadores
    $jugadores = array(
        array('Roger Federer', 'Suiza', 20, '17 de agosto de 1981'),
        array('Rafael Nadal', 'España', 20, '3 de junio de 1986'),
        array('Novak Djokovic', 'Serbia', 20, '22 de mayo de 1987'),
        array('Serena Williams', 'Estados Unidos', 23, '26 de septiembre de 1981'),
        array('Naomi Osaka', 'Japón', 4, '16 de octubre de 1997'),
        // Puedes agregar más jugadores y datos según sea necesario
    );
    ?>

    <table>
        <thead>
            <tr>
                <th>Jokalaria</th>
                <th>Herrialdea</th>
                <th>Jaiotze Data</th>
                <th>Grand Slam Tituloak</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jugadores as $jugador): ?>
                <tr>
                    <td><?= $jugador[0] ?></td>
                    <td><?= $jugador[1] ?></td>
                    <td><?= $jugador[2] ?></td>
                    <td><?= $jugador[3] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
