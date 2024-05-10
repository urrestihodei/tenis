<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            text-align: left;
        }
        input[type="text"],
        input[type="password"],
        input[type="date"] {
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
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #005bb5;
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
    <h2>Erregistratu</h2>
    <nav>
        <a href="index.html">Hasiera</a>
        <a href="torneoa.php">Txapelketak eta Emaitzak</a>
        <a href="jokalariak.php">Jokalariak</a>
        <a href="informazioa.php">Informazioa</a>
        <a href="kluba.php">Kluba</a>
        <a href="login.php">Saioa Hasi</a>
        <a href="baja.php">Baja eman</a>
    </nav>
    <form action="erregistroaEgin.php" method="POST">
        <label for="nan">NAN:</label><br>
        <input type="text" id="nan" name="nan"><br>
        <label for="izena">Izena:</label><br>
        <input type="text" id="izena" name="izena"><br>
        <label for="abizena">Abizena:</label><br>
        <input type="text" id="abizena" name="abizena"><br>
        <label for="herria">Herria:</label><br>
        <input type="text" id="herria" name="herria"><br>
        <label for="jaiotze_data">Jaiotze Data:</label><br>
        <input type="date" id="jaiotze_data" name="jaiotze_data"><br>
        <label for="erabiltzailea">Erabiltzailea:</label><br>
        <input type="text" id="erabiltzailea" name="erabiltzailea"><br>
        <label for="pasahitza">Pasahitza:</label><br>
        <input type="password" id="pasahitza" name="pasahitza"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo "Erregistroa ondo egin da.";
}
?>
</body>
</html>
