<div class="item">
    <!-- Päivitetään js:llä ja ajaxilla-->
    <div class="status">
        <p class="done active">Valmis</p>
        <p class="updating">Päivittää</p>
        <p class="error">Virhe</p>
    </div>
    <div class="formwrapper">
      <form>
        <div class="iteminput">
            <input class="item_id" type="text" name="item_id"  autofocus placeholder="Syötä viivakoodi skannerilla tai käsin">
            <input class="send" type="submit" value="Siirrä">
        </div>

        <?php radioButtons(); ?>
        <?php textArea(); ?>
        <?php submit(); ?>
        <?php printLogs(getLogs()); ?>
        
      </form>
    </div>
</div>

<?php

  function radioButtons() {
    echo '<div class="typebuttons">';
      radioButton("condition", "1", "Kunnossa");
      radioButton("condition", "2", "Korjattavissa");
      radioButton("condition", "3", "Täysin rikki");
    echo '</div>';
  }

  function textArea() { ?>
    <textarea class="new-entry" name="new_entry" rows="8" cols="80" placeholder="Lisää halutessasi merkintä esimerkiksi esineen käytettävyydestä"></textarea> <?php
  }

  function submit() { ?>
    <input type="submit" value="Merkitse"> <?php
  }

  function getLogs() {
    $logs = array(
      array("date"=>"1.2.2017", "content"=>"Kahva meni rikki"),
      array("date"=>"12.1.2017", "content"=>"Löydettiin sutattuna ja rikottuna ja vaikka mitä..."),
      array("date"=>"31.12.2016", "content"=>"Joku neropatti oli tehnyt sitä ja tätä.")
    );
    return $logs;
  }

  function printLogs($logs) {
    ?><div class="well logs"><?php
      foreach($logs as $logRow) { ?>
        <p class="none log-entry type-fixed">
            <span class="timestamp"><?php echo $logRow["date"]; ?></span>
            <?php echo $logRow["content"]; ?>
        </p> <?php
      }
    ?></div><?php
  }


?>
