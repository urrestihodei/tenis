<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenis Torneo Kuadroa</title>
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
    <h1>Tenis Torneo Kuadroa</h1>

    <?php
    // Datos simulados
    $cuartosDeFinal = array(
        array('Jugador1', 'Jugador2'),
        array('Jugador3', 'Jugador4'),
        array('Jugador5', 'Jugador6'),
        array('Jugador7', 'Jugador8'),
    );

    $semifinales = array(
        array('Ganador Cuarto 1', 'Ganador Cuarto 2'),
        array('Ganador Cuarto 3', 'Ganador Cuarto 4'),
    );

    $final = array(
        array('Ganador Semifinal 1', 'Ganador Semifinal 2'),
    );
    ?>

    <table>
        <thead>
            <tr>
                <th>Fase</th>
                <th>Partido</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function generarResultado()
            {
                return rand(0, 6) . ' - ' . rand(0, 6);
            }

            foreach ($cuartosDeFinal as $index => $enfrentamiento): ?>
                <tr>
                    <td>Cuartos de Final</td>
                    <td><?= $enfrentamiento[0] ?> vs <?= $enfrentamiento[1] ?></td>
                    <td><?= generarResultado() ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($semifinales as $index => $enfrentamiento): ?>
                <tr>
                    <td>Semifinales</td>
                    <td><?= $enfrentamiento[0] ?> vs <?= $enfrentamiento[1] ?></td>
                    <td><?= generarResultado() ?></td>
                </tr>
            <?php endforeach; ?>

            <?php foreach ($final as $index => $enfrentamiento): ?>
                <tr>
                    <td>Final</td>
                    <td><?= $enfrentamiento[0] ?> vs <?= $enfrentamiento[1] ?></td>
                    <td><?= generarResultado() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>