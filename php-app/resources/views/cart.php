<style>
    <?php include APP_STYLES . '/cart.css'; ?>
</style>
<div class="breadcrumbs">
    <a href="/">Home</a>
    <span>/</span>
    <a href="#">Cart</a>
</div>
<div class="main">
    <div class="cartList">
        <?= $exists = false ?>
        <?php foreach ($products as $product) : ?>
            <form class='cartItem' method='POST'>
                <img src='/public/images/<?= $product->image ?>'>
                <h3><?= $product->name ?></h3>
                <input type='number' style='display:none' name='removeItem' value='<?= $product->id ?>' />
                <input type='submit' name='remove' value='Remove'>
            </form>
            <?php $exists = true ?>
        <?php endforeach ?>
        <?php if ($exists) : ?>
            <form class='cartConfirm' method='POST'>
                <input type='submit' name='order' value='Submit order'>
            </form>
        <?php else : ?>
            <h2>Nothing in cart yet. Start shopping!</h2>
        <?php endif ?>
    </div>
</div>
