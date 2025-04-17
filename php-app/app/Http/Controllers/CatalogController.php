<?php

namespace App\Http\Controllers;

use Framework\View;
use App\Models\Product;

/**
 * Contains controller methods for route and each subroute of cart.
 */
class CatalogController implements ControllerInterface
{
    /**
     * Controls the main page of catalog.
     *
     * @return void
     */
    public function index(): void
    {
        $products = Product::getAll();
        View::generate('catalog.php', 'template.php', [
            'products' => $products
        ]);
    }

    /**
     * Controls the product page.
     *
     * @param int $id ID of the product.
     * @return void
     */
    public function productPage(int $id): void
    {
        $product = Product::findOne($id);
        $added = false;

        if (($cart = \Framework\Session::get('cart')))
            foreach ($cart as $id)
                if ($product->id === $id)
                    $added = true;

        if (isset($_POST['add'])) {
            if (!\Framework\Session::isAuthorized())
                header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);

            if (($cart = \Framework\Session::get('cart')) || $cart !== NULL) {
                $cart[] = $product->id;
                \Framework\Session::create('cart', $cart);
                header("Refresh:0");
            } else header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        }

        View::generate('product.php', 'template.php', [
            'product' => $product,
            'added' => $added
        ]);
    }
}
