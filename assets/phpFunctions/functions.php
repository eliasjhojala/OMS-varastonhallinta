<?php include 'mysqlFunctions.php'; ?>

<?php

$current_user_id = "esgsg";

function button($text, $class=null, $id=null) {
  echo'<button class="'.$class.'" id="'.$id.'">'.$text.'</button>';
}

function makeLink($text, $href) {
  echo "<a href='".$href."'>".$text."</a>";
}

function beginHeader($id) {
  echo'<header id="'.$id.'">';
}

function endHeader() {
  echo "</header>";
}

function radioButton($name, $value, $text) {
  echo '<input type="radio" id="'.$name.$value.$text.'" name="'.$name.'" value="'.$value.'">';
  echo '<label for="'.$name.$value.$text.'">'.$text.'</label>';
}

function validated() {
  $session_id = 2;
  $sql = "SELECT * FROM sessions WHERE session_id=$session_id";
  $result = sqlQuery($sql);
  global $current_user_id;
  if(mysqli_num_rows($result) != 0) {
    $current_user_id = 10;
    return true;
  }
  else { return false; }
}

function getUserId() {
  global $current_user_id;
  return $current_user_id;
}

function userNameCorrect($username) {
  return true;
}

function getUserName() {
  if(isset($_COOKIE["username"])) {
    return $_COOKIE["username"];
  }
  else {
    return false;
  }
}

function setUsername($username) {
  if(userNameCorrect($username)) {
    setcookie("username", $username, time()+3600);
    return true;
  }
  else {
    return false;
  }
}

?>
