<?php

  require 'passwordHash.php';

  $t_hasher = new PasswordHash(8, FALSE);

  $correct = 'test12345';
  $hash = $t_hasher->HashPassword($correct);

  echo $hash;
  
  $check = $t_hasher->CheckPassword($correct, $hash);

?>
