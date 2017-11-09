<?php
  include 'functions.php';
  if(validated()) { echo getUserId(); } else { echo "Epäonnistunut validaatio."; }
?>
