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
        <?php showItems(getItems()); ?>
      </div>
    <?php } ?>

  <?php
  }

?>


<?php /*
<div id="oldDatedSiteContent">

    <div class="own">
        <h3 class="subtitle">Lainassa</h3>
        <div class="list">
          <?php showItems(getItems()); ?>
        </div>
    </div>




    <div class="inventory">
        <div class="tabs">
            <button class="tab"><h4>Varattu</h4></button>
            <button class="tab"><h4>Varastossa</h4></button>
        </div>
        <div class="list">
          <?php showItems(getItems()); ?>
        </div>
    </div>
</div> */ ?>

<?php
  function getItems() {
    $items = array("");

    for($i = 0; $i < 50; $i++) {
      $items[$i] = array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12));
    }

    return $items;
  }
?>

<?php
  function showItems($items) {
    foreach($items as $singleItem) {
      itemGroupSample($singleItem);
    }
  }
?>

<?php
  function itemGroupSample($item) { ?>
    <div class="item-group">
        <span class="counter"><?php echo $item["count"]; ?></span>
        <p class="name"><?php echo $item["name"]; ?></p>
        <div class="dropdown hidden">
            <button class="list-toggler">Näytä yksitellen</button>
            <div class="item-list hidden">
              <ul>
                <?php foreach($item["item-list"] as $unique_item_id) { ?>
                  <li class="unique-item"><?php echo $item["name"]." ".$unique_item_id; ?>
                <?php } ?>
              </ul>
            </div>
        </div>
    </div>
  <?php }
?>
