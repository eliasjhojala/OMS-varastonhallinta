<?php

  include 'mysqlFunctions.php';
  session_start();
  $username = $_POST["username"];
  $password = $_POST["password"];

  $session_id = session_id();
  echo $session_id;
  mysqli_select_db($dbConn, "olarinma_wp-main");
  $wp_sql = "SELECT * FROM `wp_users` WHERE `user_login` LIKE '".$username."'";
  $wp_result = sqlQuery($wp_sql);

  if(mysqli_num_rows($wp_result) != 0) {
  echo cellContent($wp_result, "user_login");

    require_once('class-phpass.php');
    $wp_hasher = new PasswordHash(8, true);
    if($wp_hasher->CheckPassword(trim($password), cellContent($wp_result, "user_pass"))) {
      echo "OIKEIN";
      echo cellContent($wp_result, "user_login");
      // mysqli_select_db($dbConn, "olarinma_varasto");
      // sqlQuery("INSERT INTO `sessions` (`user_id`, `session_id`) VALUES ('".$user_id."', '".$session_id."')");
      // echo "<br><br>".$user_id."<br><br>"; echo $session_id;
    }
    else {

    }

  }



?>
