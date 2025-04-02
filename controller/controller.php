<?php

use App\http\Request;

class Controller {
    private $routes;
    private $method; 
    private $nameSpaceController = "App\\controller\\";   
    public function __construct() {
        $this->routes = require __DIR__ . "/../routes/router.php";
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function Action($path) {
        $datas = Request::data($this->method, $path);
            
        if(!isset($this->routes[$this->method][$path['path']])) {
            return self::notFounded($path['path']);
        } else {
            [$class, $action] = explode("@" , $this->routes[$this->method][$path['path']]);
            $controller = $this->nameSpaceController . $class;
            $appController = new $controller();
            return $appController->$action($datas);
        }

    }

    private static function notFounded($pathDest) {
        $_SESSION['error404'] = $pathDest;
        require_once __DIR__ . "/../views/error404.php";
    }
}