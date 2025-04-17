<?php

namespace Framework;

/**
 * Contains methods to operate with HTML.
 */
class View
{
    /**
     * Creates or rewrites $_SESSION variable.
     *
     * @param  string $content Name of the file with data to show to user.
     * @param  mixed $template Name of the template file.
     * @param  array $data Array of the values that will be passed to HTML.
     * @return void
     */
    public static function generate(string $content, string $template, ?array $data = null): void
    {
        if (is_array($data))
            extract($data);
        include_once APP_VIEWS . $template;
    }
}
