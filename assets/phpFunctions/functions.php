<?php session_start(); ?>

<?php include 'mysqlFunctions.php'; ?>

<?php

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


?>
