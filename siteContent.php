<div id="siteContent">


    <div class="own">
        <h3 class="subtitle">Lainassa</h3>
        <div class="well list">
          <?php showItems(getItems()); ?>
        </div>
    </div>


    <?php include 'itemColumn.php'; ?>


    <div class="inventory">
        <div class="tabs">
            <button class="tab"><h4>Varattu</h4></button>
            <button class="tab"><h4>Varastossa</h4></button>
        </div>
        <div class="well list">
          <?php showItems(getItems()); ?>
        </div>
    </div>
</div>


<?php
  function getItems() {
    $items = array(
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15)),
      array("count" => "45", "name" => "kirves", "item-list" =>
      array(42, 646, 23, 34, 12)),
      array("count" => "3", "name" => "saha", "item-list" =>
      array(4, 87, 23, 34, 15))
    );
    return $items;
  }
?>

<?php
  function showItems($items) {
    foreach($items as $singleItem) {
      itemSample($singleItem);
    }
  }
?>

<?php
  function itemSample($item) { ?>
    <div class="none own-item-sample own-item">
        <span class="counter"><?php echo $item["count"]; ?></span>
        <p class="name"><?php echo $item["name"]; ?></p>
        <div class="dropdown hidden">
            <button>Poista kaikki</button>
            <button class="list-toggler">Näytä yksitellen</button>
            <div class="item-list hidden">
              <ul>
                <?php foreach($item["item-list"] as $unique_item_id) { ?>
                  <li class="unique-item"><?php echo $item["name"]." ".$unique_item_id; ?><button class="remove">Poista</button></li>
                <?php } ?>
              </ul>
            </div>
        </div>
    </div>
  <?php }
?>
