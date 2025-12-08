<?php
class Router {

    public static function run() {
        $module = $_GET['mod'] ?? 'user';
        $action = $_GET['act'] ?? 'index';

        $controllerFile = "modules/$module/" . ucfirst($module) . "Controller.php";

        if (!file_exists($controllerFile)) {
            die("❌ Modul '$module' tidak ditemukan.");
        }

        require_once $controllerFile;

        $controllerName = ucfirst($module) . "Controller";
        $controller = new $controllerName();

        if (!method_exists($controller, $action)) {
            die("❌ Action '$action' tidak ditemukan di controller '$controllerName'.");
        }

        $controller->$action();
    }
}
