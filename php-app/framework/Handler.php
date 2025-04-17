<?php

namespace Framework;

/**
 * Contains methods for various error, exceptions handling and logging.
 */
class Handler
{
    /**
     * Registers custom error handling function as default.
     *
     * @return void
     */
    public static function register(): void
    {
        set_error_handler(function (int $level, string $message, string $file, int $line): bool {
            switch ($level) {
                case E_WARNING:
                    $type = 'Warning';
                    break;
                case E_PARSE:
                    $type = 'Parse Error';
                    break;
                case E_NOTICE:
                    $type = 'Notice';
                    break;
                case E_CORE_WARNING:
                    $type = 'Core Warning';
                    break;
                case E_COMPILE_ERROR:
                    $type = 'Compile Error';
                    break;
                case E_COMPILE_WARNING:
                    $type = 'Compile Warning';
                    break;
                case E_STRICT:
                    $type = 'Strict';
                    break;
                case E_RECOVERABLE_ERROR:
                    $type = 'Recoverable Error';
                    break;
                case E_DEPRECATED:
                    $type = 'Deprecated';
                    break;
                default;
                    return false;
            }

            error_log(Handler::formatLog($type, $message, $file, $line), 3, APP_LOG);
            die(Handler::formatScreen($type, $message, $file, $line));

            return true;
        }, E_ALL);

        register_shutdown_function(function (): bool {
            $error = error_get_last();
            if ($error === NULL)
                return false;

            switch ($error["type"]) {
                case E_ERROR:
                    $type = 'E_ERROR';
                    break;
                case E_CORE_ERROR:
                    $type = 'E_CORE_ERROR';
                    break;
                case E_COMPILE_ERROR:
                    $type = 'E_COMPILE_ERROR';
                    break;
                case E_RECOVERABLE_ERROR:
                    $type = 'E_RECOVERABLE_ERROR';
                    break;
                default;
                    return false;
            }

            if ($error["type"] === E_ERROR || $error["type"] === E_CORE_ERROR || $error["type"] === E_COMPILE_ERROR || $error["type"] === E_RECOVERABLE_ERROR)
                while (ob_get_level())
                    ob_end_clean();

            error_log(Handler::formatLog($type, $error["message"], $error["file"], $error["line"]), 3, APP_LOG);
            echo Handler::formatScreen($type, $error["message"], $error["file"], $error["line"]);

            return true;
        });

        set_exception_handler(function ($e): bool {
            error_log(Handler::formatLog("Exception", $e->getMessage(), $e->getFile(), $e->getLine()), 3, APP_LOG);
            echo Handler::formatScreen("Exception", $e->getMessage(), $e->getFile(), $e->getLine());

            return true;
        });
    }

    /**
     * Load the messages for the given locale.
     *
     * @param  string  $type Type of error.
     * @param  string  $message Message about the error.
     * @param  string  $file File that contains given error.
     * @param  int  $line Line of the file that contains given error.
     * @return string Log-formatted string.
     */
    public static function formatLog(string $type, string $message, string $file, int $line): string
    {
        $trace = str_replace("\n", '', print_r(debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10), true));
        $date = gmdate("Y-m-d\TH:i:s\Z");
        $str = str_replace("\n", '', $message);
        return "[$date] $type at line $line in $file: $str Stack trace: $trace\n";
    }

    /**
     * Load the messages for the given locale.
     *
     * @param  string  $type Type of error.
     * @param  string  $message Message about the error.
     * @param  string  $file File that contains given error.
     * @param  int  $line Line of the file that contains given error.
     * @return string HTML page about the error.
     */
    public static function formatScreen(string $type, string $message, string $file, int $line): string
    {
        $trace = print_r(debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 10), true);

        return "
            <style>
                h1 {
                    width 100%;
                    height: 60px;
                    display: flex;
                    align-items:center;
                    background: #ff4747;
                    color: white;
                    margin:0;
                    padding: 10px;
                    font-family: Cambria, Garamond, Helvetica;
                }
                table {
                    width: 100%;
                }
                th, td {
                    margin: 10px 0;
                    padding: 6px;
                }
                th {
                    background: #d1d1d1;
                    font-family: Cambria, Garamond, Helvetica;
                }
                td {
                    background: #f5f5f5;
                }
                pre {
                    white-space: pre-wrap;
                    white-space: -moz-pre-wrap;
                    white-space: -pre-wrap;
                    white-space: -o-pre-wrap;
                    word-wrap: break-word;
                }
            </style>
            <h1>Fatal error: " . substr($message, 0, 64) . "...</h1>
            <table>
                <tr>
                    <th>Error</th>
                    <td><pre>$message</pre></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><pre>$type</pre></td>
                </tr>
                <tr>
                    <th>File</th>
                    <td><pre>$file</pre></td>
                </tr>
                <tr>
                    <th>Line</th>
                    <td><pre>$line</pre></td>
                </tr>
                <tr>
                    <th>Stack trace</th>
                    <td><pre>$trace</pre></td>
                </tr>
            </table>
        ";
    }
}
