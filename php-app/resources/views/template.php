<!DOCTYPE html>
<html lang="en">

<head>
    <title>PokeShop</title>
    <meta charSet='UTF-8' />
    <meta httpEquiv='content-type' content='text/html' />
    <meta name='description' content='Online-shop for a lot of Pokemon stuff!' />
    <meta name='keywords' content='pokeshop, online-shop, market' />
    <meta name='author' content='Paul Litovka' />
    <meta name='owner' content='Paul Litovka' />
    <meta name='copyright' content='Paul Litovka' />
    <meta name='designer' content='Paul Litovka' />
    <meta name='reply-to' content='pashalitovka@gmail.com' />
    <meta name='distribution' content='global' />
    <meta name='subject' content='Event calendar' />
    <meta name='language' content='EN, RU, UK, HU, DE' />
    <meta name='coverage' content='worldwide' />
    <meta name='rating' content='general' />
    <meta name='robots' content='all' />
    <meta name='googlebot' content='all' />
    <meta name='googlebot-news' content='all' />
    <meta name='revisit-after' content='1 day' />
    <meta httpEquiv='pragma' content='no-cache' />
    <meta httpEquiv='cache-control' content='no-cache' />
    <meta name='theme-color' content='#6775ee' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/styles/style.css">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="/public/images/pokeball.png" alt="PokeShop logo">
            <span>PokéShop</span>
        </div>
        <div class="info">
            <a href="/">ABOUT</a>
            <a href="/catalog">CATALOG</a>
            <a href="https://github.com/PAXANDDOS">CONTACT</a>
        </div>
        <div class="search">
            <input type="search" placeholder="Search Pikachu, Plush, T-Shirts...">
        </div>
        <div class="user">
            <?php if (\Framework\Session::isAuthorized()) : ?>
                <a href='/cart'>CART</a>
                <a href='/account'>ACCOUNT</a>
            <?php else : ?>
                <a href='/signin'>SIGN IN</a>
            <?php endif ?>
        </div>
    </div>
    <?php include APP_VIEWS . $content; ?>
    <footer>
        <a href="https://paxanddos.github.io/" target="_blank">Copyright &#169; PokéShop | PAXANDDOS | All rights reserved</a>
    </footer>
</body>

</html>
