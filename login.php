<?php

$servername = "localhost";
$erabiltzailea = "root";
$pasahitza = "mysql";
$dbname = "froga";

// Datu basearekin konexioa sortuko dugu
$conn = new mysqli($servername, $erabiltzailea, $pasahitza, $dbname, 3307);

// Frogatu konexia
if ($conn->connect_error) {
	die("Konexio akatsa: " . $conn->connect_error);
} else {
	echo "Konexioa ondo burutu da" . "<br>";
}

?>