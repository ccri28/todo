<?php
// Connessione al database MySQL
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);*/
//require 'connection_db.php';
require 'functions.php';
connectToDatabase();

// Controlli sulla form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];

  // Prepara la query SQL per recuperare il valore checked
  $stmt = $conn->prepare("SELECT checked FROM todo WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $checked_db = $row["checked"];
  if($checked_db == 0)
  {
    $checked = 1;
  }elseif($checked_db == 1){
    $checked = 0;
  }

  // Prepara la query SQL
  $stmt = $conn->prepare("UPDATE todo SET checked = ? WHERE id = ?");
  $stmt->bind_param("si", $checked, $id);

  // Esegue la query SQL
  if ($stmt->execute() === TRUE) {
    echo "Todo aggiornata con successo!";
  } else {
    echo "Errore: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>