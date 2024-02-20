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
            background-color: #0066cc;
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
    </style>
</head>
<body>

    <h2>Sesioa Hasi</h2>

    <form action="tenis.php" method="post">
        <label for="erabiltzaile_izena">Erabiltzailea:</label>
        <input type="text" name="erabiltzaile_izena" required>

        <label for="pasahitza">Pasahitza:</label>
        <input type="password" name="pasahitza" required>

        <input type="submit" value="Sesioa Hasi">
    </form>

    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

</body>
</html>
