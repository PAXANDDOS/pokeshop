<?php

namespace App\Http\Controllers\Api;

use Framework\Api\Http;
use App\Models\Product;

/**
 * API methods for catalog
 */
class CatalogController extends Controller
{
    /**
     * Shows the entire catalog.
     *
     * @return void
     */
    public function index(): void
    {
        Http::response('json', Product::getAll());
    }

    /**
     * Shows product by ID.
     *
     * @param int $id ID of the product.
     * @return void
     */
    public function show(int $id): void
    {
        Http::response('json', Product::findOne($id));
    }
}
