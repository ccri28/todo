<?php
// Connessione al database MySQL
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);*/
//require 'assets/db/connection_db.php';
require 'functions.php';
connectToDatabase();

// Controlli sulla form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Prepara la query SQL
  $stmt = $conn->prepare("DELETE FROM todo");

  // Esegue la query SQL
  if ($stmt->execute() === TRUE) {
    echo "Lista Todo eliminata con successo!";
  } else {
    echo "Errore: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>