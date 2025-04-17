<style>
    <?php include APP_STYLES . '/auth.css'; ?>
</style>
<div class="breadcrumbs">
    <a href="/">Home</a>
    <span>/</span>
    <a href="#">Sing in</a>
</div>
<div class="main">
    <div class="login">
        <h1>Welcome to PokeShop!</h1>
        <form method="POST">
            <label>
                Your name<br />
                <input type="name" id="name" name="name" maxlength='16' required />
            </label>
            <label>
                Your password<br />
                <input type="password" id="password" name="password" minlength="8" maxlength="64" required />
            </label>
            <button type="submit">Sign in</button>
        </form>
        <span>
            Forgot your password?
            <a href="#">Let&apos;s get it back!</a>
        </span>
        <span>
            Not a member yet?
            <a href="/signup">Sign up!</a>
        </span>
    </div>
</div>
