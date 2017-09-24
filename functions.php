<?php

function button($text) {
  echo"<button>".$text."</button>";
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
