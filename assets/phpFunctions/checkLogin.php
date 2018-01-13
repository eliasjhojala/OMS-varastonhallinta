<?php

  include 'mysqlFunctions.php';
  session_start();
  $username = $_POST["username"];
  $password = $_POST["password"];

  $session_id = session_id();
  mysqli_select_db($dbConn, "olarinma_wp-main");
  $wp_sql = "SELECT * FROM `wp_users` WHERE `user_login` LIKE '".$username."'";
  $wp_result = sqlQuery($wp_sql);
  
  if(mysqli_num_rows($wp_result) != 0) {
    
    $wp_row = $wp_result->fetch_assoc();
    $user_id = $wp_row["ID"];
    $hashed_pass = $wp_row["user_pass"];
  
    require_once('class-phpass.php');
    $wp_hasher = new PasswordHash(8, true);
    if($wp_hasher->CheckPassword(trim($password), $hashed_pass)) {
      mysqli_select_db($dbConn, "olarinma_varasto");
      sqlQuery("INSERT INTO `sessions` (`user_id`, `session_id`) VALUES ('".$user_id."', '".$session_id."')");
      header('Location: /');
    }
    else {
      header('Location: /siteLogin.php');
    }
  
  }
  else {
    header('Location: /siteLogin.php');
  }
  


?>
