<?php

namespace Framework\Api;

use Framework\Validation as ValidationCore;

/**
 * Contains API methods to validate user requests.
 */
class Validation
{
    /**
     * Validates user data.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return bool
     */
    public static function validateUser(string $name, string $email = null, string $password = null): bool
    {
        if (!ValidationCore::validateName($name))
            Http::response('json', ['message' => "'$name' is not a valid name. Must be from 4 to 10 characters."], 400);

        if ($email && (!ValidationCore::validateEmail($email)))
            Http::response('json', ['message' => "'$email' is not a valid email."], 400);

        if ($password && (!ValidationCore::validatePassword($password)))
            Http::response('json', ['message' => "'$password' is not a valid password. Minimum 8 characters, 1 letter and 1 number."], 400);

        return true;
    }

    /**
     * Checks whether passwords are the same.
     *
     * @param string $password1
     * @param string $password2
     * @return bool
     */
    public static function validatePassMatch(string $password1, string $password2): bool
    {
        if ($password1 !== $password2)
            Http::response('json', ["message" => "Passwords did not match."], 400);

        return true;
    }
}
