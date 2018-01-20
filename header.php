<div id="linkbar">
    <a id="menuBoxIcon" href class="toggle-menubox material-icons"></a>
    <span class="title">Varastonhallinta</span>
    <div id="linkBarLinks">
      <?php
        if(validated()) {
          makeLink("Lainaa", "");
          makeLink("Palauta", "");
          makeLink("Kirjaudu ulos", "assets/phpFunctions/logOut.php");
        }
      ?>
    </div>
</div>
