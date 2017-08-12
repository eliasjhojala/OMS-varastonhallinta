<?php

include 'auth.php';

// Create connection
$dbConn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($dbConn->connect_error) {
    die("Connection failed: " . $dbConn->connect_error ."<br>");
}
else{
  echo "Connection succesfull<br>";
}

function newUser($f_n, $l_n, $n_n, $mem_id) {
  global $dbConn;
  $sql = "INSERT INTO users (first_name, last_name, nick_name, member_id)
  VALUES ('$f_n', '$l_n', '$n_n', '$mem_id')";

  sqlQuery($sql);
}

function userList() {
  global $dbConn;
  $sql = "SELECT FROM 'users'";
  return sqlQuery($sql, true);
}

function sqlQuery($sql, $return = false) {
  global $dbConn;
  if($return) {
    return $dbConn->query($sql);
  }
  else {
    if ($dbConn->query($sql) === TRUE) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $dbConn->error;
    }
  }
}

function closeConnection() { //Should not be used in most cases
  global $dbConn;
  $dbConn->close();
}

newUser("ahsdgdsgds", "sdhdsg", "sdhsdg", "sgsdg");
?>
