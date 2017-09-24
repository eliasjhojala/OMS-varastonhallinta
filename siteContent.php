<div id="siteContent">


    <div class="own">
        <h3 class="subtitle">Lainassa</h3>
        <div class="well list">
            <!-- Malliesine js:ää varten -->
            <div class="none own-item-sample own-item active">
                <span class="counter">1</span>
                <p class="name">Saha</p>
                <div class="dropdown hidden">
                    <button>Poista kaikki</button>
                    <button class="list-toggler">Näytä yksitellen</button>
                    <div class="item-list hidden">
                      <p class="unique-item">Saha 123<button class="remove">Poista</button></p>
                    </div>
                </div>

            </div>
            <template id="own-item-template">
              <div class="none own-item-sample own-item active">
                  <span class="counter">1</span>
                  <p class="name">Saha</p>
                  <div class="dropdown hidden">
                      <button>Poista kaikki</button>
                      <button class="list-toggler">Näytä yksitellen</button>
                      <div class="item-list hidden">
                        <p class="unique-item">Saha 123<button class="remove">Poista</button></p>
                      </div>
                  </div>
              </div>
            </template>

            <div class="none own-item-sample own-item">
                <span class="counter">4</span>
                <p class="name">Kirves</p>
                <div class="dropdown hidden">
                  <button>Poista kaikki</button>
                  <button>Näytä yksitellen</button>
                </div>
            </div>

            <div class="none own-item-sample own-item">
                <span class="counter">145</span>
                <p class="name">Naula</p>
                <div class="dropdown hidden">
                    <button>Poista kaikki</button>
                    <button>Näytä yksitellen</button>
                </div>
            </div>
            <!-- Tähän haetaan ajaxilla dataa joka muokataan js:llä kivaan muotoon-->

        </div>
    </div>


    <div class="item">
        <!-- Päivitetään js:llä ja ajaxilla-->
        <div class="status">
            <p class="done active">Valmis</p>
            <p class="updating">Päivittää</p>
            <p class="error">Virhe</p>
        </div>
        <div class="formwrapper">
            <div class="iteminput">
                <input class="item_id" type="text" name="item_id"  autofocus placeholder="Syötä viivakoodi skannerilla tai käsin">
                <input class="send" type="submit" value="Siirrä">
            </div>

            <div class="typebuttons">
                <button class="ok active">Kunnossa</button>
                <button class="fixable">Korjattavissa</button>
                <button class="broken">Tosi rikki</button>
            </div>

            <textarea class="new-entry" name="new_entry" rows="8" cols="80" placeholder="Lisää halutessasi merkintä esimerkiksi esineen käytettävyydestä"></textarea>
            <input type="submit" value="Merkitse">
            <!-- Päivitetän ajaxilla-->
            <div class="well logs">
                <!-- Mallimerkintä JS:lle-->
                <p class="none log-entry type-fixed">
                    <span class="timestamp">1.2.2017</span>
                    Kahva meni rikki
                </p>

                <p class="none log-entry type-fixed">
                    <span class="timestamp">12.1.2017</span>
                    Löydettiin sutattuna ja rikottuna ja vaikka mitä...
                </p>

                <p class="none log-entry type-fixed">
                    <span class="timestamp">31.12.2016</span>
                    Joku neropatti oli tehnyt sitä ja tätä.
                </p>

            </div>

        </div>
    </div>


    <div class="inventory">
        <div class="tabs">
            <button class="tab"><h4>Varattu</h4></button>
            <button class="tab"><h4>Varastossa</h4></button>
        </div>
        <div class="well list">
            <!-- Malliesine js:ää varten -->
            <div class="none inventory-item-sample inventory-item">
                <span class="counter">3</span>
                <p class="name">Puolijoukkueteltta</p>
                <div class="dropdown hidden">
                    <button>Nappi 1</button>
                    <button>Nappi 2</button>
                    <button>Nappi 3</button>
                </div>
            </div>

            <div class="none inventory-item-sample inventory-item">
                <span class="counter">8</span>
                <p class="name">niger</p>
                <div class="dropdown hidden">
                    <button>Nappi 1</button>
                    <button>Nappi 2</button>
                    <button>Nappi 3</button>
                </div>
            </div>

            <div class="none inventory-item-sample inventory-item">
                <span class="counter">24</span>
                <p class="name">bigfun</p>
                <div class="dropdown hidden">
                    <button>Nappi 1</button>
                    <button>Nappi 2</button>
                    <button>Nappi 3</button>
                </div>
            </div>
            <!-- Tähän haetaan ajaxilla dataa joka muokataan js:llä kivaan muotoon-->

        </div>
    </div>
</div>
