<?php
namespace Core;

use App\Controllers\Main;

class App {

    function __construct () {

        define("URI", $_SERVER['REQUEST_URI']);
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);
        define("WEB_URI", 'localhost');
        define("PROTOCOL", 'http');
        define("PUBLIC_FOLDER", '/public/data/');

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