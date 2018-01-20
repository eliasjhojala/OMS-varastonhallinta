<?php
 // ini_set('display_errors', 'On');
/*
Kaikki funktiot on muutettava sellaisiksi, että ne palauttavat vain jsonia tai teksiä
*/

session_start();

include 'auth.php';
$dbConn = new mysqli($servername, $username, $password);
mysqli_select_db($dbConn, $dbname);


function validated() {
  $session_id = session_id();
  $sql = "SELECT * FROM `sessions` WHERE `session_id` LIKE '$session_id' AND `active`=1";
  if(mysqli_num_rows(sqlQuery($sql)) != 0) {
    sqlQuery("UPDATE `sessions` SET last_used=".time()." WHERE `session_id` LIKE '$session_id' AND `active`=1");
    return true;
  }
  return false;
}

function getUserId() {
  $session_id = session_id();
  $result = sqlQuery("SELECT * FROM `sessions` WHERE `session_id` LIKE '$session_id'");
  return cellContent($result, "user_id");
}

function getUser() {
  $session_id = session_id();
  $toSelect = "`ID`, `user_login`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`";
  queryToJson("SELECT $toSelect FROM `olarinma_wp-main`.`wp_users` WHERE id = (SELECT user_id FROM `sessions` WHERE `session_id` LIKE '$session_id')");
}


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


function myLoans() {
  $sql = "SELECT * FROM actions WHERE 'user_id'=$current_user_id AND 'action_type_id'=".actionTypeId("loan");
  $result = sqlQuery($sql);
  $loans = array();
  while($row = $result->fetch_assoc()) {
    $thing_id = $row["thing_id"];
    $loaned = $row["actionTypeId"] == actionTypeId("loan");
    $returned = $row["actionTypeId"] == actionTypeId("return");
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
      $sql2 = "SELECT * FROM classes WHERE 'id'=".$row1["class_id"];
      $result2 = sqlQuery($sql2);
      while($row2 = $result2->fetch_assoc()) {
        $item_name = $row2["name"];
      }
      $item_name = $item_name . $row1["name"];
    }

    echo $item_name."<br>";

  }
}

function sqlQuery($sql) {
  global $dbConn;
  return $dbConn->query($sql);
}

function cellContent($query, $columName) {
  $row = $query->fetch_assoc();
  return $row[$columName];
}

function closeConnection() { //Should not be used in most cases
  global $dbConn;
  $dbConn->close();
}

function queryToJson($query) {
  $result = sqlQuery($query);
  while($row = $result->fetch_assoc()) $arrayToJson[] = $row;
  echo json_encode($arrayToJson);
}

function actionsToJson($thing_id) {
  queryToJson("SELECT * FROM `actions` WHERE `thing_id` = $thing_id");
}

function tableToJson($table) {
  queryToJson("SELECT * FROM `$table`");
}

function parameterValidator($do) {
  $allowedTables = array("items", "classes");
  if(in_array($do, $allowedTables)) { return tableToJson($do); }
  return false;
}

if(validated()) {
  if(isset($_REQUEST['getTable'])) { parameterValidator($_REQUEST['getTable']); }
  if(isset($_REQUEST['getActions'])) { actionsToJson($_REQUEST['getActions']); }
  if(isset($_REQUEST['getUser'])) { getUser(); }
}


?>
