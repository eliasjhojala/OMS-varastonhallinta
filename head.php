<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
  <?php
    $js = array("jquery", "csstemput", "ajax");
  ?>

  <?php
    foreach ($js as $j) {
      ?><script src="assets/js/<?php echo $j.".js"; ?>"></script>
  <?php } ?>
</head>
