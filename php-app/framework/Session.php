<?php

namespace Framework;

/**
 * Contains methods to operate with $_SESSION.
 */
class Session
{
    /**
     * Gets the variable value from $_SESSION.
     *
     * @param  string $name Name of the requested $_SESSION variable.
     * @return mixed Value of the requested $_SESSION variable.
     */
    public static function get(string $name): mixed
    {
        if (!isset($_SESSION[$name]))
            return false;
        return $_SESSION[$name];
    }

    /**
     * Creates or rewrites $_SESSION variable.
     *
     * @param  string $name Name of the $_SESSION variable.
     * @param  mixed $value Value of the $_SESSION variable.
     * @return bool Status of the operation.
     */
    public static function create(string $name, mixed $value): bool
    {
        if (isset($_SESSION[$name]))
            unset($_SESSION[$name]);
        $_SESSION[$name] = $value;

        return true;
    }

    /**
     * Removes a requested variable from $_SESSION.
     *
     * @param  string $name Name of the $_SESSION variable.
     * @return bool Status of the operation.
     */
    public static function remove(string $name): bool
    {
        if (!isset($_SESSION[$name]))
            return false;

        unset($_SESSION[$name]);
        return true;
    }

    /**
     * Redirects the user to the signin page if they are not authorized.
     *
     * @return void
     */
    public static function redirectIfNotAuthorized(): void
    {
        if (!isset($_SESSION['name']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
    }

    /**
     * Redirects the user to the account page if they are authorized.
     *
     * @return void
     */
    public static function redirectIfAuthorized(): void
    {
        if (isset($_SESSION['name']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/account", false, 303);
    }

    /**
     * Checks if the user is authorized.
     *
     * @return void
     */
    public static function isAuthorized(): bool
    {
        return isset($_SESSION['name']);
    }

    /**
     * Analyzes user agent and IP address from request and session, destroys the session if they are different.
     *
     * @return void
     */
    public static function protect(): void
    {
        if (
            isset($_SESSION['userAgent']) &&
            ($_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'] ||
                $_SESSION['remoteAddr'] != $_SERVER['REMOTE_ADDR'])
        )
            Session::destroy();
    }

    /**
     * Sets up session data for newly authorized user.
     *
     * @return void
     */
    public static function setup($user): void
    {
        Session::create('id', $user->id);
        Session::create('name', $user->name);
        Session::create('email', $user->email);
        Session::create('cart', []);
        Session::create('userAgent', $_SERVER['HTTP_USER_AGENT']);
        Session::create('remoteAddr', $_SERVER['REMOTE_ADDR']);
    }

    /**
     * Destroys all session data and the session itself.
     *
     * @return void
     */
    public static function destroy(): void
    {
        Session::destroyCookie();
        session_unset();
        session_destroy();
    }

    /**
     * Destroys the session cookie from users browser.
     *
     * @return void
     */
    private static function destroyCookie(): void
    {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
}
