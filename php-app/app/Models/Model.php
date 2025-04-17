<?php

namespace App\Models;

abstract class Model
{
    abstract public static function getAll(): array;

    abstract public static function create(array $data): Model | bool;

    abstract public static function findOne(int | string $id): Model | bool;

    abstract public static function update(array $data, int | string $id): Model;

    abstract public static function destroy(int $id): bool;
}
