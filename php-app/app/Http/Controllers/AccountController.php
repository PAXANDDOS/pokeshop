<?php

namespace App\Http\Controllers;

use Framework\Session;
use Framework\View;

/**
 * Contains controller methods for route and each subroutes of account.
 */
class AccountController implements ControllerInterface
{
    /**
     * Controls the main page of account.
     *
     * @return void
     */
    public function index(): void
    {
        Session::redirectIfNotAuthorized();

        if (Session::get('name') === false)
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);

        if (isset($_POST['logout'])) {
            Session::destroy();
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        }

        $orders = \App\Models\Order::findWhere('user_id', Session::get('id'));

        View::generate('account.php', 'template.php', [
            'orders' => $orders
        ]);
    }
}
