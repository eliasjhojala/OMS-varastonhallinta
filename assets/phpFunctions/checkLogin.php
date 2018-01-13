<?php
ini_set('display_errors', 'On');

  include 'mysqlFunctions.php';
  //
  // $username = $_POST["username"];
  // $password = $_POST["password"];
  

  $session_id = session_id();
<<<<<<< Updated upstream
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
=======
  $wp_sql = "SELECT * FROM wp_users";
  mysqli_select_db("olarinma_wp-main", $dbConn);
  $wp_result = sqlQuery($wp_sql);
  mysqli_select_db($dbname, $dbConn);
  
  while($row = $wp_result->fetch_assoc()) {
    echo $row["user_login"]."<br>";
  }
  
  // if(mysqli_num_rows($wp_result) != 0) {
  //
  //   require_once('class-phpass.php');
  //   $wp_hasher = new PasswordHash(8, true);
  //   if($wp_hasher->CheckPassword(trim($password), cellContent($wp_result, "user_pass"))) {
  //     sqlQuery("INSERT INTO sessions (user_id, session_id) VALUES ($user_id, $session_id)");
  //     echo "toimii";
  //   }
  //   else {
  //     echo "pieleen meni 1";
  //   }
  //
  // }
  
  // else { echo "pieleen meni 2"; }
>>>>>>> Stashed changes


?>
