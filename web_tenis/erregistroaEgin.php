<?php
    include 'konexioa.php';

    // Formularioko datuak hartu
    $nan = $_POST['nan'];
    $izena = $_POST['izena'];
    $abizena = $_POST['abizena'];
    $herria = $_POST['herria'];
    $jaiotze_data = $_POST['jaiotze_data'];
    $erabiltzailea = $_POST['erabiltzailea'];
    $pasahitza = $_POST['pasahitza'];

    
    $sql = "INSERT INTO jokalaria (nan, izena, abizena, herria, jaiotze_data, tituluak, erabiltzailea, pasahitza, aktibo)
            VALUES ('$nan', '$izena', '$abizena', '$herria', '$jaiotze_data', 0, '$erabiltzailea', '$pasahitza', 1)";

    //ondo erregistratzean, erregistroa.php orrira bidaliko zaitu
    if ($conn->query($sql) === TRUE) {
        header("Location: erregistroa.php?success=true");
        exit(); 

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
