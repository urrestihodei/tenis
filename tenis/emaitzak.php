<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emaitzak</title>
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
    <h1>Emaitzak</h1>

    <?php
    // Datos simulados
    $partidos = array(
        array('Roger Federer - Carlitos Alcaraz ' , 1, 6, 'Hodei Urresti - Rafael Nadal'),
        array('Novak Djokovic', 7, 5, 'Andy Murray'),
        array('Serena Williams', 6, 2, 'Maria Sharapova'),
        array('Stefanos Tsitsipas', 6, 4, 'Alexander Zverev'),
        array('Simona Halep', 7, 6, 'Naomi Osaka'),
        array('Dominic Thiem', 6, 3, 'Daniil Medvedev'),
        // Puedes agregar más partidos y jugadores según sea necesario
    );
    ?>

    <table>
        <thead>
            <tr>
                <th>Jokalaria 1</th>
                <th>Emaitza</th>
                <th>Jokalaria 2</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $partido): ?>
                <tr>
                    <td><?= $partido[0] ?></td>
                    <td><?= $partido[1] ?> - <?= $partido[2] ?></td>
                    <td><?= $partido[3] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

