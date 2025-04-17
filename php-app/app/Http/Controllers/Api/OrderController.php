<?php

namespace App\Http\Controllers\Api;

use Framework\Api\{Http, Auth};
use App\Models\Order;

/**
 * API methods for orders
 */
class OrderController extends Controller
{
    /**
     * Shows all orders.
     *
     * @return void
     */
    public function index(): void
    {
        Http::response('json', Order::findWhere('user_id', Auth::user()->id));
    }

    /**
     * Shows order by ID.
     *
     * @param int $id ID of the order.
     * @return void
     */
    public function show(int $id): void
    {
        Auth::user();
        Http::response('json', Order::findOne($id));
    }

    /**
     * Creates new order.
     *
     * @return void
     */
    public function create(array $data): void
    {
        $user = Auth::user();
        foreach ($data as $product) {
            Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => property_exists($product, 'quantity') ? $product->quantity : 1,
            ]);
        }
        Http::response('json', [
            'message' => "Order succesfully created."
        ], 201);
    }

    /**
     * Deletes the order by ID.
     *
     * @return void
     */
    public function destroy(int $id): void
    {
        Auth::user();
        Http::response('json', Order::destroy($id), 201);
    }
}
