<?php

  echo hashPasswordPlease($_GET["pswd"]);

  function hashPasswordPlease($password) {
    if ( empty($wp_hasher) ) {
      require_once('class-phpass.php');
      // By default, use the portable hash from phpass
      $wp_hasher = new PasswordHash(8, true);
    }
    return $wp_hasher->CheckPassword(trim($password), '$P$BVC002nfA12Cy4s02eEM8bP4ThKBAq.');
  }

 ?>
