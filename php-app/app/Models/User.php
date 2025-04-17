<?php

namespace App\Models;

use Framework\DB;

class User extends Model
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public string $created_at;
    public string $updated_at;

    /**
     * Converts the database data into an array of User objects.
     *
     * @return array Array of users.
     */
    public static function getAll(): array
    {
        return DB::connect()->query("SELECT * FROM users")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Creates new user in the database.
     *
     * @param  array $data Array of parameters.
     * @return User Newly created User object.
     */
    public static function create(array $data): User
    {
        $db = DB::connect();
        $stm = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        try {
            $stm->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
        } catch (\PDOException $e) {
            echo "Creation failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM users WHERE name='" . $data['name'] . "'")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested User from the database.
     *
     * @param  int $id ID of the requested user.
     * @return User Single User object.
     */
    public static function findOne(int | string $id): User
    {
        return DB::connect()->query("SELECT * FROM users WHERE id=$id")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested User from the database.
     *
     * @param string $param Searched parameter.
     * @param mixed $value Parameter value.
     * @return User|array Single User object or array of Users.
     */
    public static function findWhere(string $param, mixed $value): User | array
    {
        return DB::connect()->query("SELECT * FROM users WHERE $param='$value'")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Updates user in the database.
     *
     * @param  array $data Array of parameters.
     * @param  int $id ID of the requested user.
     * @return User Newly updated User object.
     */
    public static function update(array $data, int | string $id): User
    {
        $db = DB::connect();
        $stm = $db->prepare("UPDATE users SET name=:name, email=:email, password=:password, updated_at=now() WHERE id=$id");
        try {
            $stm->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
        } catch (\PDOException $e) {
            echo "Updating failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM users WHERE id=$id")->fetchObject(__CLASS__);
    }

    /**
     * Removes requested user from the database.
     *
     * @param  int $id ID of the requested user.
     * @return bool Operation status.
     */
    public static function destroy(int $id): bool
    {
        return DB::connect()->prepare("DELETE FROM users WHERE id=$id")->execute();
    }
}
