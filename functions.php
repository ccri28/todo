<?php 
  require 'assets/db/connection_db.php';

  // Funzione per connettersi al database
  function connectToDatabase() 
  {
    require 'assets/db/connection_db.php';
    return $conn;
  }
  
  // Funzione per eseguire una query
  function executeQuery($conn, $sql) 
  {
    return $conn->query($sql);
  }

  // Funzione per recuperare tutte le righe della tabella todo
  function getTodoRows($conn) 
  {
    $sql = "SELECT * FROM todo";
    $result = executeQuery($conn, $sql);
    $rows = array();
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  /*
  continuare qui 
  */

  // Funzione per chiudere la connessione al database
  function closeDatabaseConnection($conn) 
  {
    $conn->close();
  }

?>