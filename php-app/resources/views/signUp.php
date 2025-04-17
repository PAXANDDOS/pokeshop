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
                Your email<br />
                <input type="email" id="email" name="email" maxlength="32" required />
            </label>
            <label>
                Your password<br />
                <input type="password" id="password" name="password" minlength="8" maxlength="64" required />
            </label>
            <label>
                Repeat your password<br />
                <input type="password" id="password" name="password_confirmation" minlength="8" maxlength="64" required />
            </label>
            <button type="submit">Sign up</button>
        </form>
        <span>
            Already a member?
            <a href="/signin">Sign in!</a>
        </span>
    </div>
</div>
