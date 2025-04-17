<?php

namespace App\Models;

use Framework\DB;

/**
 * Contains fields and methods for the Product model.
 */
class Product extends Model
{
    public int $id;
    public string $name;
    public float $price;
    public int $stock;
    public string $image;
    public string $created_at;
    public string $updated_at;

    /**
     * Converts the database data into an array of Product objects.
     *
     * @return array Array of products.
     */
    public static function getAll(): array
    {
        return DB::connect()->query("SELECT * FROM products")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Creates new product in the database.
     *
     * @param  array $data Array of parameters.
     * @return Product Newly created Product object.
     */
    public static function create(array $data): Product
    {
        $db = DB::connect();
        $stm = $db->prepare("INSERT INTO products (name, price, stock, image, created_at, updated_at) VALUES (:name, :price, :stock, :image, now(), now())");
        try {
            $stm->execute([
                ':name' => $data['name'],
                ':price' => $data['price'],
                ':stock' => $data['stock'],
                ':image' => $data['image']
            ]);
        } catch (\PDOException $e) {
            echo "Creation failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM products WHERE name='" . $data['name'] . "'")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested Product from the database.
     *
     * @param  int $id ID of the requested product.
     * @return Product Single Product object.
     */
    public static function findOne(int | string $id): Product
    {
        return DB::connect()->query("SELECT * FROM products WHERE id=$id")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested Product from the database.
     *
     * @param string $param Searched parameter.
     * @param mixed $value Parameter value.
     * @return Product|array Single Product object or array of Product.
     */
    public static function findWhere(string $param, mixed $value): Product | array
    {
        return DB::connect()->query("SELECT * FROM products WHERE $param='$value'")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Updates product in the database.
     *
     * @param  array $data Array of parameters.
     * @param  int $id ID of the requested product.
     * @return Product Newly updated Product object.
     */
    public static function update(array $data, int | string $id): Product
    {
        $db = DB::connect();
        $stm = $db->prepare("UPDATE products SET name=:name, price=:price, stock=:stock, image=:image, updated_at=now() WHERE id=$id");
        try {
            $stm->execute([
                ':name' => $data['name'],
                ':price' => $data['price'],
                ':stock' => $data['stock'],
                ':image' => $data['image']
            ]);
        } catch (\PDOException $e) {
            echo "Updating failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM products WHERE id=$id")->fetchObject(__CLASS__);
    }

    /**
     * Removes requested product from the database.
     *
     * @param  int $id ID of the requested product.
     * @return bool Operation status.
     */
    public static function destroy(int $id): bool
    {
        return DB::connect()->prepare("DELETE FROM products WHERE id=$id")->execute();
    }
}
