<?php
require_once(dirname(__FILE__) ."../../config/config.php");
abstract class View {
    public static function render(string $view_name) {
        include(BASE_URL . "/views/$view_name.php");
        exit;
    }

    public static function redirect(string $route) {
        header("Location: " . BASE_URL . $route);
        exit;
    }
}