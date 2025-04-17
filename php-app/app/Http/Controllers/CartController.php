<?php

namespace App\Http\Controllers;

use Framework\View;
use Framework\Session;

/**
 * Contains controller methods for route and each subroute of cart.
 */
class CartController implements ControllerInterface
{
    /**
     * Controls the main page of cart.
     *
     * @return void
     */
    public function index(): void
    {
        Session::redirectIfNotAuthorized();

        $products = [];
        foreach (Session::get('cart') as $id)
            $products[] = \App\Models\Product::findOne($id);

        if (isset($_POST['remove'])) {
            $cart = Session::get('cart');
            if (($key = array_search($_POST['removeItem'], $cart)) !== false)
                unset($cart[$key]);
            Session::create('cart', $cart);
            header("Refresh:0");
        }

        if (isset($_POST['order'])) {
            $user_id = Session::get('id');
            foreach (Session::get('cart') as $product_id)
                \App\Models\Order::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'quantity' => 1,
                ]);
            Session::create('cart', []);
            header("Refresh:0");
        }

        View::generate('cart.php', 'template.php', [
            'products' => $products
        ]);
    }
}
