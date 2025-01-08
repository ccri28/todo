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

// Query per recuperare tutte le righe della tabella todo
$sql = "SELECT * FROM todo";

// Esecuzione della query
$result = $conn->query($sql);

$html = "";
// Verifica se la query ha restituito risultati
if ($result->num_rows > 0) {
    echo "<div class='table-responsive overflow-x-auto'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<thead class='table-dark'>";
    echo "<tr><th scope='col'>Attività</th><th scope='col'>Azioni</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    // Ciclo per stampare le righe
    while($row = $result->fetch_assoc()) {
      $btn_delete = sprintf("<button class='cursor-pointer btn btn-danger btn-sm ms-1 delete' data-id='%s'><i class='fa fa-trash'></i></button>",$row['id']);
      if($row['checked'] == 0)
      {
        $class_text = '';
        $btn_check = sprintf("<button class='cursor-pointer btn btn-success btn-sm check' data-id='%s'><i class='fa fa-check'></i></button>",$row['id']);
      }elseif($row['checked'] == 1){
        $class_text = 'text-decoration-line-through';
        $btn_check = sprintf("<button class='cursor-pointer btn btn-danger btn-sm check' data-id='%s'><i class='fa fa-times'></i></button>",$row['id']);
      }
      echo "<tr>";
      echo sprintf("<td><p class='%s'>%s</p></td>",$class_text,$row["text"]);
      echo sprintf("<td><div class='btn-group'>%s %s</div></td>",$btn_check,$btn_delete);
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    echo "Nessun risultato trovato";
  }

$conn->close();
?>