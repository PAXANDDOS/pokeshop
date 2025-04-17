<?php

namespace App\Http\Controllers;

use Framework\View;
use App\Models\User;

/**
 * Contains controller methods for route and each subroute of authorization pages
 */
class AuthController implements ControllerInterface
{
    /**
     * Controls the sign in page.
     *
     * @return void
     */
    public function index(): void
    {
        \Framework\Session::redirectIfAuthorized();

        if (isset($_POST['name'])) {
            if (!$data = User::findWhere('name', $_POST['name']))
                die("Invalid credentials!");

            if ($data[0]->password === hash('md5', $_POST['password'])) {
                \Framework\Session::setup($data[0]);
                header("Location: http://" . $_SERVER["HTTP_HOST"] . "/account", false, 303);
            } else die("Invalid credentials!");
        }

        View::generate('signIn.php', 'template.php');
    }

    /**
     * Controls the sign up page.
     *
     * @return void
     */
    public function signUp(): void
    {
        \Framework\Session::redirectIfAuthorized();

        if (isset($_POST['name'])) {
            if ($_POST['password'] !== $_POST['password_confirmation'])
                die("Password did not match.");

            User::create([
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => hash("md5", $_POST['password'])
            ]);

            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        }

        View::generate('signUp.php', 'template.php');
    }
}
