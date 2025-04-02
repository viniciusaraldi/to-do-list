<?php

namespace App\http;
class Request {
    public static function data($method, $info) {
        return $method == 'get' ? ($info['query'] ?? '') : json_decode(file_get_contents("php://input"), true) ?? $_POST;
    }
}