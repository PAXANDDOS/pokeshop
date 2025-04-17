<?php

namespace Framework\Api;

use App\Models\{Session, User};

/**
 * Contains methods to operate with users API tokens.
 */
class Auth
{
    /**
     * Looks for authorization token of specific type.
     * Acts like middleware: throws exception if user is not authorized.
     *
     * @param string $type Type of the token.
     * @return string Authorization token.
     */
    public static function token(string $type = "Bearer"): string
    {
        $headers = apache_request_headers();
        if (!array_key_exists('Authorization', $headers))
            Http::response('json', ['message' => 'You are not authorized.'], 401);

        $authData = explode(" ", $headers['Authorization']);
        if ($authData[0] !== "Bearer" && $type === "Bearer")
            Http::response('json', ['message' => "Expected $type token but got " . $authData[0]], 403);

        $token = $authData[1];
        if (!Session::findOne($token))
            Http::response('json', [
                "message" => 'Invalid token.'
            ], 403);

        return $token;
    }

    /**
     * Creates a random unified token for the user.
     *
     * @param User $user User object.
     * @param int $length Token length.
     * @return string Unified generated token.
     */
    public static function attempt(User $user, int $length = 128): string
    {
        $char = str_shuffle('_-0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $charlen = strlen($char);
        $hash = str_shuffle($user->password);
        $token = "emon1uid$user->id.$hash.";
        for ($i = 0; $i < $length; $i++)
            $token .= $char[rand(0, $charlen - 1)];
        return Session::create([
            'token' => $token,
            'user_id' => $user->id,
        ])->token;
    }


    /**
     * Grabs user based on the token.
     *
     * @return User User object.
     */
    public static function user(): User
    {
        return User::findOne(Session::findOne(self::token())->user_id);
    }
}
