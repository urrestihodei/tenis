<?php

	include "konexioa.php";

	$login = $_POST['erabiltzaile_izena'];
	$pass = $_POST['pasahitza'];


	$sql_ikaslea= $conn->query("SELECT * FROM jokalaria WHERE erabiltzailea = '$login' AND pasahitza= '$pass'");

		if ($sql_ikaslea->num_rows > 0) {		
			session_start();
			$_SESSION['erabiltzailea'] = $_POST['erabiltzaile_izena'];
			header("location:informazioa.php");
		}
		else {
			header("location: login.php");
		}

?>
