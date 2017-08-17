<div id="siteContent">
    <div class="own">
        <h3>Lainassa</h3>
        <div class="well list">
            <!-- Malliesine js:ää varten -->
            <div class="none own-item-sample own-item">
                <span class="counter">1</span>
                <p class="name">Saha</p>
                <div class="dropdown hidden">
                    <button>Nappi 1</button>
                    <button>Nappi 2</button>
                    <button>Nappi 3</button>
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

        <form>
            <input type="text" name="item_id"  autofocus placeholder="Syötä viivakoodi skannerilla tai käsin">
            <input class="send" type="submit" value="Siirrä">
        </form>
        <form>
            <button>Muutama</button>
            <button>nappi</button>
            <button>usko jo!</button>

            <textarea name="log_entry" rows="8" cols="80" placeholder="Lisää halutessasi merkintä esimerkiksi esineen käytettävyydestä"></textarea>
            <input type="submit" value="Merkitse">
            <!-- Päivitetän ajaxilla-->
            <div class="well logs">
                <!-- Mallimerkintä JS:lle-->
                <p class="none log-entry type-fixed">
                    <span class="timestamp">1.2.2017</span>
                    Kahva meni rikki
                </p>

            </div>
        </form>
    </div>
    <div class="inventory">
        <button class="tab"><h4>Varattu</h4></button>
        <button class="tab"><h4>Varastossa</h4></button>
        <div class="well list">
            <!-- Malliesine js:ää varten -->
            <div class="none own-item-sample own-item">
                <span class="counter">1</span>
                <p class="name">Saha</p>
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
