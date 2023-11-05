<?php
class Request {
    public static function get(string $key) {
        return $_GET[$key];
    }

    public static function post(string $key) {
        return $_POST[$key];
    }
}