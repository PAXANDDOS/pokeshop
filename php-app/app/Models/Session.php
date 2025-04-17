<?php

namespace App\Models;

use Framework\DB;

/**
 * Contains fields and methods for the Session model.
 */
class Session extends Model
{
    public string $token;
    public string $user_id;
    public string $created_at;

    /**
     * Converts the database data into an array of Session objects.
     *
     * @return array Array of sessions.
     */
    public static function getAll(): array
    {
        return DB::connect()->query("SELECT * FROM sessions")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Creates new session in the database.
     *
     * @param  array $data Array of parameters.
     * @return Session Newly created Session object.
     */
    public static function create(array $data): Session | bool
    {
        $db = DB::connect();
        $stm = $db->prepare("INSERT INTO sessions (user_id, token) VALUES (:user_id, :token)");
        try {
            $stm->execute([
                ':user_id' => $data['user_id'],
                ':token' => $data['token'],
            ]);
        } catch (\PDOException $e) {
            echo "Creation failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM sessions WHERE token='" . $data['token'] . "'")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested Session from the database.
     *
     * @param  string $id ID of the requested session.
     * @return Session Single Session object.
     */
    public static function findOne(int | string $token): Session | bool
    {
        return DB::connect()->query("SELECT * FROM sessions WHERE token='$token'")->fetchObject(__CLASS__);
    }

    /**
     * Gets the requested Session from the database.
     *
     * @param string $param Searched parameter.
     * @param mixed $value Parameter value.
     * @return Product|array Single Product object or array of Product.
     */
    public static function findWhere(string $param, mixed $value): Product | array | bool
    {
        return DB::connect()->query("SELECT * FROM sessions WHERE $param='$value'")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Updates session in the database.
     *
     * @param  array $data Array of parameters.
     * @param  int $id ID of the requested session.
     * @return Session Newly updated Session object.
     */
    public static function update(array $data, int | string $token): Session
    {
        $db = DB::connect();
        $stm = $db->prepare("UPDATE sessions SET user_id=:user_id, token=:token WHERE token=$token");
        try {
            $stm->execute([
                ':user_id' => $data['user_id'],
                ':token' => $data['token'],
            ]);
        } catch (\PDOException $e) {
            echo "Updating failed: " . $e->getMessage();
        }

        return $db->query("SELECT * FROM sessions WHERE token='$token'")->fetchObject(__CLASS__);
    }

    /**
     * Removes requested session from the database.
     *
     * @param  int $id ID of the requested session.
     * @return bool Operation status.
     */
    public static function destroy(int | string $token): bool
    {
        return DB::connect()->prepare("DELETE FROM sessions WHERE token='$token'")->execute();
    }
}
