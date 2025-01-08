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
  $todo = $_POST["todo"];

  // Controlli anti SQL injection
  $todo = mysqli_real_escape_string($conn, $todo);

  // Salva la todo nel database
  $sql = "INSERT INTO todo (text) VALUES ('$todo')";
  if ($conn->query($sql) === TRUE) {
    echo "Todo aggiunta con successo!";
  } else {
    echo "Errore: " . $conn->error;
  }
}

$conn->close();
?>