<style>
    <?php include APP_STYLES . '/account.css'; ?>
</style>
<div class="breadcrumbs">
    <a href="/">Home</a>
    <span>/</span>
    <a href="#">Account</a>
</div>
<div class="main">
    <div class="account">
        <div class="account-data">
            <div class="account-image"></div>
            <div class="account-main">
                <div class="account-info">
                    <h2 class="account-info-name">Welcome, <?= \Framework\Session::get('name') ?>!</h2>
                    <h2 class="account-info-name"><?= \Framework\Session::get('email') ?></h2>
                </div>
                <form method="POST">
                    <input type="submit" name='logout' value="Log out" class="account-info-logout" />
                </form>
            </div>
        </div>
        <div class="account-orders">
            <div class="account-orders-head">Your order history</div>
            <div class="account-orders-body">
                <?php $exists = false ?>
                <?php foreach ($orders as $value => $order) : ?>
                    <div class='account-order-object'>
                        <div class='account-order-objmain'>
                            <img class='account-order-image' src='/public/images/<?= $order->image ?>' alt='order-image' />
                            <div class='account-order-data'>
                                <label class='account-order-label'>Order #<?= $order->id ?></label>
                                <h2 class='account-order-name'><?= $order->name ?></h2>
                                <span class='account-order-price'>$ <?= $order->price ?></span>
                            </div>
                        </div>
                        <span class='account-order-date'>
                            <?= $order->created_at ?>
                        </span>
                    </div>
                    <?php $exists = true ?>
                <?php endforeach ?>
                <?php if (!$exists) : ?>
                    <h2 class='account-nothing'>No orders yet. Start shopping!</h2>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
