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
  $id = $_POST["id"];

  // Prepara la query SQL
  $stmt = $conn->prepare("DELETE FROM todo WHERE id = ?");
  $stmt->bind_param("i", $id);

  // Esegue la query SQL
  if ($stmt->execute() === TRUE) {
    echo "Todo eliminata con successo!";
  } else {
    echo "Errore: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>