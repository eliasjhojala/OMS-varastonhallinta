<head>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
  <?php

    $js = array("jquery", "index", "csstemput");
  ?>

  <?php
    foreach ($js as $j) {
      ?><script src="assets/js/<?php echo $j.".js"; ?>"></script>
  <?php } ?>
</head>
