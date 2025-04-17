<?php

namespace Framework\Api;

/**
 * Contains API methods to operate HTTP.
 */
class Http
{
    /**
     * Creates and sends an HTTP response.
     *
     * @param string $type Type of the response (e.g. json, form-data)
     * @param mixed $data Payload of the response.
     * @param int $status Status code of the response.
     * @return void
     */
    public static function response(string $type, mixed $data, int $status = 200): void
    {
        http_response_code($status);
        switch (trim($type)) {
            case 'json':
                header('Content-Type: application/json; charset=utf-8');
                $response = json_encode($data);
                break;
            case 'form-data':
                header('Content-Type: multipart/form-data; charset=utf-8');
                break;
            case 'form-url':
                header('Content-Type: application/x-www-form-urlencoded; charset=utf-8');
                break;
            case 'xml':
                header('Content-Type: application/xml; charset=utf-8');
                break;
            case 'yaml':
                header('Content-Type: text/yaml; charset=utf-8');
                break;
            case 'edn':
                header('Content-Type: application/edn; charset=utf-8');
                break;
            case 'plain':
                header('Content-Type: text/plain; charset=utf-8');
                break;
            case 'file':
                header('Content-Type: application/octet-stream; charset=utf-8');
                break;
        }

        exit($response);
    }
}
