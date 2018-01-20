<div id="siteContent">

  <div class="column" id="left">
    <?php generateTabs("cart, Kori; loaned, Lainassa"); ?>
  </div>

  <div class="column" id="center">
    <?php include 'itemColumn.php'; ?>
  </div>

  <div class="column" id="right">
    <?php generateTabs("reserved, Varattu; storage, Varastossa"); ?>


  </div>

</div>

<template id='item-group-sample'>
  <div class="item-group">
    <span class="counter"></span>
    <p class="name">
    <div class="dropdown hidden">
      <button class="list-toggler">Näytä yksitellen</button>
      <div class="item-list hidden">
        <ul>
          <li class="unique-item"></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<?php

  function generateTabs($optionsAsString) {
    $options = explode(";", $optionsAsString);
    ?>

    <div class="tab-buttons">
    <?php foreach($options as $option) { ?>
      <?php $id = trim(explode(",", $option)[0]); ?>
      <?php $name = trim(explode(",", $option)[1]); ?>
      <?php button($name, "tab-button", $id."-tab-button"); ?>
    <?php } ?>
    </div>

    <?php foreach($options as $option) { ?>
      <?php $id = trim(explode(",", $option)[0]); ?>
      <div class="tab-content" id="<?php echo $id."-tab-content"; ?>">
      </div>
    <?php } ?>

  <?php
  }

?>
