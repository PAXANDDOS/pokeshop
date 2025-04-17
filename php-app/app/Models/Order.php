<?php

namespace App\Models;

use Framework\DB;

/**
 * Contains fields and methods for the Order model.
 */
class Order extends Model
{
    public int $id;
    public int $user_id;
    public int $product_id;
    public int $quantity;
    public string $created_at;
    public string $updated_at;

    /**
     * Converts the database data into an array of Order objects.
     *
     * @return array Array of orders.
     */
    public static function getAll(): array
    {
        return DB::connect()->query("SELECT * FROM orders")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Creates new order in the database.
     *
     * @param  array $data Array of parameters.
     * @return Order Newly created Order object.
     */
    public static function create(array $data): Order
    {
        $db = DB::connect();
        $stm = $db->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        try {
            $stm->execute([
                ':user_id' => $data['user_id'],
                ':product_id' => $data['product_id'],
                ':quantity' => $data['quantity'],
            ]);
        } catch (\PDOException $e) {
            echo "Creation failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM orders WHERE user_id=" . $data['user_id'] . " AND product_id=" . $data['product_id'])->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested Order from the database.
     *
     * @param  int $id ID of the requested order.
     * @return Order Single Order object.
     */
    public static function findOne(int | string $id): Order
    {
        return DB::connect()->query("SELECT * FROM orders LEFT JOIN products ON products.id = orders.product_id WHERE orders.id=$id")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested Order from the database.
     *
     * @param string $param Searched parameter.
     * @param mixed $value Parameter value.
     * @return Order|array Single Order object or array of Order.
     */
    public static function findWhere(string $param, mixed $value): Order | array
    {
        return DB::connect()->query("SELECT orders.*, products.name, products.price, products.image  FROM orders LEFT JOIN products ON products.id = orders.product_id WHERE $param='$value'")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Updates order in the database.
     *
     * @param  array $data Array of parameters.
     * @param  int $id ID of the requested order.
     * @return Order Newly updated Order object.
     */
    public static function update(array $data, int | string $id): Order
    {
        $db = DB::connect();
        $stm = $db->prepare("UPDATE orders SET user_id=:user_id, product_id=:product_id, quantity=:quantity WHERE id=$id");
        try {
            $stm->execute([
                ':user_id' => $data['user_id'],
                ':product_id' => $data['product_id'],
                ':quantity' => $data['quantity'],
            ]);
        } catch (\PDOException $e) {
            echo "Updating failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM orders WHERE id=$id")->fetchObject(__CLASS__);
    }

    /**
     * Removes requested order from the database.
     *
     * @param  int $id ID of the requested order.
     * @return bool Operation status.
     */
    public static function destroy(int $id): bool
    {
        return DB::connect()->prepare("DELETE FROM orders WHERE id=$id")->execute();
    }
}
