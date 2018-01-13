<?php session_start(); ?>
<body>
  <?php include 'header.php'; ?>
  <?php
  if(validated()) {
    include 'siteContent.php';
  } else {
    include 'siteLogin.php';
  }
  ?>
  <?php include 'footer.php'; ?>
</body>
