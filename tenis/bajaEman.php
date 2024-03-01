<?php
    include 'konexioa.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formularioko datuak hartzen ditu
        $erabiltzailea = $_POST['erabiltzailea'];
        $pasahitza = $_POST['pasahitza'];

       
        $sql = "SELECT * FROM jokalaria WHERE erabiltzailea = '$erabiltzailea' AND pasahitza = '$pasahitza'";

        $result = $conn->query($sql);

        // Formularioan jarritako kredentzialekin datuak daudela bermatzen du.
        if ($result->num_rows > 0) {
            
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

    <h2>Errorea: ezin da baimenik gabe sartu</h2>
    <p>Saioa hasi orri honetara sartzeko.</p>

</body>
</html>
