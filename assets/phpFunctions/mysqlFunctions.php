<?php
ini_set('display_errors', 'On');
/*
Kaikki funktiot on muutettava sellaisiksi, että ne palauttavat vain jsonia tai teksiä
*/

include 'auth.php';

$dbConn = new mysqli($servername, $username, $password);
mysqli_select_db($dbConn, $dbname);


function newUser($f_n, $l_n, $n_n, $mem_id) {
  $sql = "INSERT INTO users (first_name, last_name, nick_name, member_id)
  VALUES ('$f_n', '$l_n', '$n_n', '$mem_id')";

  sqlQuery($sql);
}

function newItem($item_id, $name, $class_id) {
  global $current_user_id;

  $sql = "INSERT INTO items (id, name, class_id)
  VALUES ('$item_id', '$name', '$class_id')";
  sqlQuery($sql);

  $sql = "INSERT INTO actions (user_id, thing_id, action_type_id)
  VALUES ('$current_user_id', '$item_id', '1')";
  sqlQuery($sql);
}

/*function newClass($f_n, $l_n, $n_n, $mem_id) {
  $sql = "INSERT INTO users (first_name, last_name, nick_name, member_id)
  VALUES ('$f_n', '$l_n', '$n_n', '$mem_id')";

  sqlQuery($sql);
}*/

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

function itemList() {
  $sql = "SELECT * FROM `items`";
  echo 'Seuraavaksi itemit:\n'; // Debuggaukseen
  echo json_encode(sqlQuery($sql));
}

/* Oletetaan, että session kyseisellä keksillä on olemassa. Palauttaa 'etunimi sukunimi'*/
/*  $sql = "SELECT user_id FROM sessions WHERE 'session_id'=".$cookie;
  $userID = sqlQuery($sql);
  $sql = "SELECT first_name, last_name FROM users WHERE 'member_id'=".$userID;
  $result = sqlQuery($sql);

  if ($result->num_rows == 0 and $result->num_columns == 2) {

  }

}*/

function myLoans() {
  $sql = "SELECT * FROM actions WHERE 'user_id'=$current_user_id AND 'action_type_id'=".actionTypeId("loan");
  $result = sqlQuery($sql);
  $loans = array();
  while($row = $result->fetch_assoc()) {
    $thing_id = $row[thing_id];
    $loaned = $row[actionTypeId] == actionTypeId("loan");
    $returned = $row[actionTypeId] == actionTypeId("return");
    if($loaned) { array_push($loans, $thing_id); }
    if($returned) { unset($loans[array_search($thing_id)]); }
  }

  return $loans;

}

function printMyLoansPlain() {
  $loans = myLoans();
  foreach($loans as $loaned_id) {
    $item_name = "";
    $sql1 = "SELECT * FROM items WHERE 'item_id'=$loaned_id";
    $result1 = sqlQuery($sql1);
    while($row1 = $result1->fetch_assoc()) {
      $sql2 = "SELECT * FROM classes WHERE 'id'=".row1[class_id];
      $result2 = sqlQuery($sql2);
      while($row2 = $result2->fetch_assoc()) {
        $item_name = $row2[name];
      }
      $item_name = $item_name . $row1[name];
    }

    echo $item_name."<br>";

  }
}

function sqlQuery($sql) {
  global $dbConn;
  return $dbConn->query($sql);
}

function cellContent($query, $columName) {
  $newQuery = $query;
  $row = $newQuery->fetch_assoc();
  return $row[$columName];
}

function closeConnection() { //Should not be used in most cases
  global $dbConn;
  $dbConn->close();
}


if (isset($_POST['do'])){
switch($_POST['do']) {
  case 'test':
    echo 'testi';
    break;
  case 'items':
    itemList();
    break;
}
}

if (isset($_GET['do'])){
  echo 'get asetettu';
switch($_GET['do']) {
  case 'test':
    echo 'testi';
    break;
  case 'items':
    itemList();
    break;
}
}



?>
