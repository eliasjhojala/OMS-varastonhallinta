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
  $sql = "INSERT INTO users (first_name, last_name, nick_name, member_id)
  VALUES ('$f_n', '$l_n', '$n_n', '$mem_id')";

  sqlQuery($sql);
}

function newItem($f_n, $l_n, $n_n, $mem_id) {
  $sql = "INSERT INTO items (first_name, last_name, nick_name, member_id)
  VALUES ('$f_n', '$l_n', '$n_n', '$mem_id')";

  sqlQuery($sql);
}

function newClass($f_n, $l_n, $n_n, $mem_id) {
  $sql = "INSERT INTO users (first_name, last_name, nick_name, member_id)
  VALUES ('$f_n', '$l_n', '$n_n', '$mem_id')";

  sqlQuery($sql);
}

function userList() {
  $sql = "SELECT * FROM users";
  return sqlQuery($sql);
}

function printUserList() {
  $result = userList();
  while($row = $result->fetch_assoc()) {
    echo $row[first_name]."<br>";
  }
}

function sqlQuery($sql) {
  global $dbConn;
  return $dbConn->query($sql);
}

function closeConnection() { //Should not be used in most cases
  global $dbConn;
  $dbConn->close();
}



newUser("ahsdgdsgds", "sdhdsg", "sdhsdg", "sgsdg");
printUserList();
?>
