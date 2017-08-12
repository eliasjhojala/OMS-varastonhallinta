<?php
include 'auth.php';
$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>

<?php

function newUser($first_name, $last_name, $nickname, $member_id) {
$sql = <<<SQL
  INSERT INTO `users` (id, first_name, last_name, nick_name, member_id)
  VALUES (NULL, 'test', 'teste', 'test', 222)
SQL;
  
  echo "TOIMIIKOKOFUNKTIOJOTENKIN<br>";
  
  if($db->query($sql) === TRUE){
    echo "EI TOIMI";
  }
  else {
    echo "TOIMII";
  }
  echo "<br>Toimii vertailun jälkeen<br>";
  mysqli_close($db);
}


?>
