<style>
    <?php include APP_STYLES . '/catalog.css'; ?>
</style>
<div class="breadcrumbs">
    <a href="/">Home</a>
    <span>/</span>
    <a href="/catalog">Catalog</a>
</div>
<div class="main">
    <div class="filters">
        <h2>FILTERS</h2>
        <form>
            <h3>Poké Plush</h3>
            <input type="checkbox" id="6inch" name="6inch" class="custom-checkbox">
            <label for="6inch">6" and Under</label><br>
            <input type="checkbox" id="7inch" name="7inch" class="custom-checkbox">
            <label for="7inch">Over 6" to 7"</label><br>
            <input type="checkbox" id="8inch" name="8inch" class="custom-checkbox">
            <label for="8inch">Over 7" to 8"</label><br>
            <input type="checkbox" id="10inch" name="10inch" class="custom-checkbox">
            <label for="10inch">Over 8" to 10"</label><br>
            <input type="checkbox" id="15inch" name="15inch" class="custom-checkbox">
            <label for="15inch">Over 10" to 15"</label><br>
            <input type="checkbox" id="Jinch" name="Jinch" class="custom-checkbox">
            <label for="Jinch">Over 15" to Jumbo</label><br>
        </form>
        <form>
            <h3>Clothing</h3>
            <input type="checkbox" id="tshirts" name="tshirts" class="custom-checkbox">
            <label for="tshirts">T-Shirts</label><br>
            <input type="checkbox" id="hoodies" name="hoodies" class="custom-checkbox">
            <label for="hoodies">Hoodies</label><br>
            <input type="checkbox" id="caps" name="caps" class="custom-checkbox">
            <label for="caps">Caps, Hats, Beanies</label><br>
            <input type="checkbox" id="socks" name="socks" class="custom-checkbox">
            <label for="socks">Socks</label><br>
            <input type="checkbox" id="bags" name="bags" class="custom-checkbox">
            <label for="bags">Bags</label><br>
        </form>
        <form>
            <h3>Figures & Pins</h3>
            <input type="checkbox" id="figma" name="figma" class="custom-checkbox">
            <label for="figma">Figma</label><br>
            <input type="checkbox" id="funko" name="funko" class="custom-checkbox">
            <label for="funko">Funko</label><br>
            <input type="checkbox" id="nendoroid" name="nendoroid" class="custom-checkbox">
            <label for="nendoroid">Nendoroid</label><br>
            <input type="checkbox" id="tcg" name="tcg" class="custom-checkbox">
            <label for="tcg">TCG Sets</label><br>
        </form>
        <form>
            <h3>Video game</h3>
            <input type="checkbox" id="games" name="games" class="custom-checkbox">
            <label for="games">Games</label><br>
            <input type="checkbox" id="hardware" name="hardware" class="custom-checkbox">
            <label for="hardware">Hardware</label><br>
        </form>
        <form>
            <h3>Pricing</h3>
            <input type="range" name="pricing" id="range" min="0" max="9999" step="1" value="0"><br>
            <div id="rangenum">
                <label id="min">0</label>
                <label id="max">999</label>
            </div>
        </form>
    </div>
    <div class="list">
        <div class="page_head">
            <div id="number">
                <h2>CATALOG</h2>
                <span><b>PRODUCTS:</b> ( 1 - <?= count($products) ?> of <?= count($products) ?> )</span>
            </div>
            <div id="pages">
                <span>SORT BY:</span>
                <select class="custom-select">
                    <option>Revelance</option>
                    <option>Price (low to high)</option>
                    <option>Price (high to low)</option>
                    <option>Newest</option>
                    <option>Top Selling</option>
                </select>
                <span>ITEMS PER PAGE:</span>
                <select class="custom-select">
                    <option>30</option>
                    <option>60</option>
                    <option>90</option>
                </select>
                <span>PAGE:</span>
                <select class="custom-select">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>
        </div>
        <div class="page_body">
            <?php foreach ($products as $value => $key) : ?>
                <a href='/catalog/<?= $key->id ?>'>
                    <div class='single'>
                        <img src='/public/images/<?= $key->image ?>' alt='Product image'>
                        <h3><?= $key->name ?></h3>
                        <span>$ <?= $key->price ?></span>
                        <label>BUY</label>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>
