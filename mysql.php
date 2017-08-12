<?php


  include 'auth.php';
  $db = new mysqli($servername, $username, $password, $dbname);

  if($db->connect_errno > 0){
      die('Unable to connect to database [' . $db->connect_error . ']');
  }


  $sql = "INSERT INTO users (first_name, last_name, nick_name)
  VALUES ('TESTIHENKILOTOIMIIKOHANTAMA', 'Doe', 'john@example.com')";
    
    echo "TOIMIIKOKOFUNKTIOJOTENKIN<br>";
    
    if ($db->query($sql) === TRUE) {
      echo "TOIMII";
    }
    $db->close();



?>
