<?php

function button($text) {
  echo"<button>".$text."</button>";
}

function makeLink($text, $href) {
  echo "<a href='".$href."'>".$text."</a>";
}

function beginHeader($class) {
  echo'<header class="'.$class.'">';
}

function endHeader() {
  echo "</header>";
}

?>
