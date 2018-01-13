<?php
  include 'functions.php';
  if(validated()) { echo "Onnistui: ".getUserId(); } else { echo "Epäonnistunut validaatio."; }
?>
