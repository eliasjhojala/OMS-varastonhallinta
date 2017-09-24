<head>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
  <?php
<<<<<<< Updated upstream
    $js = array("jquery", "index", "app", "ajax");
=======
    $js = array("jquery", "index");
>>>>>>> Stashed changes
  ?>

  <?php
    foreach ($js as $j) {
      ?><script src="assets/js/<?php echo $j.".js"; ?>"></script>
  <?php } ?>
</head>
