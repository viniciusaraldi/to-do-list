<?php

namespace App\http;
class Response {
    public static function json(array $data, $status = 200) {
        http_response_code($status);
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public static function view($path, $data = []) {
        $_SESSION['list'] = $data;
        require_once $path;
    }
}



