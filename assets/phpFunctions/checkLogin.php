<?php

  include 'mysqlFunctions.php';

  $username = $_POST["username"];
  $password = $_POST["password"];

  $session_id = session_id();
  $wp_sql = "SELECT * FROM wp_users WHERE user_login=$username";
  $wp_result = wp_sqlQuery($wp_sql);
  
  if(mysqli_num_rows($wp_result) != 0) {
    
    require_once('class-phpass.php');
    $wp_hasher = new PasswordHash(8, true);
    if($wp_hasher->CheckPassword(trim($password), cellContent($wp_result, "user_pass"))) {
      sqlQuery("INSERT INTO sessions (user_id, session_id) VALUES ($user_id, $session_id)");
      header('Location: ../../index.php');
    }
    else {
      header('Location: ../../siteLogin.php');
    }
    
  }
  
  else { header('Location: ../../siteLogin.php'); }


?>
