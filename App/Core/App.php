<?php
namespace Core;

use App\Controllers\Main;

class App {

    private $config = [];

    public $db;

    function __construct () {

        define("URI", $_SERVER['REQUEST_URI']);
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);

    }

    function start () {

        $route = explode('/', URI);

        $route = ucwords(strtolower($route[1]));
        if (class_exists("App\Controllers\\$route")) {
            $className = "App\Controllers\\$route";
            return new $className();
        }
        if (class_exists("App\Models\\$route")) {
            $className = "App\Models\\$route";
            return new $className();
        }

        return new Main();


    }
}

?>