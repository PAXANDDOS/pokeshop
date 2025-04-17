<?php

namespace Framework;

use Framework\Exceptions\ValidationException;

/**
 * Contains methods to validate user requests.
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
    public static function validateUser(string $name, string $email, string $password = null): bool
    {
        if (!self::validateName($name)) {
            throw new ValidationException("'$name' is not a valid name. Must be from 4 to 10 characters.");
        }

        if ($email && (!self::validateEmail($email))) {
            throw new ValidationException("'$email' is not a valid email.");
        }

        if ($password && (!self::validatePassword($password))) {
            throw new ValidationException("'$password' is not a valid password. Minimum 8 characters, 1 letter and 1 number.");
        }

        return true;
    }

    /**
     * Validates given name.
     *
     * @param string $name
     * @return bool
     */
    public static function validateName(string $name): bool
    {
        return (bool)preg_match('/^[a-zA-Z0-9]{4,16}$/', $name);
    }

    /**
     * Validates given email.
     *
     * @param string $email
     * @return bool
     */
    public static function validateEmail(string $email): bool
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Validates given password.
     *
     * @param string $password
     * @return bool
     */
    public static function validatePassword(string $password): bool
    {
        return (bool)preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password);
    }
}
