<?php

namespace Faculdade\Moinhos;

use Faculdade\Moinhos\Exceptions\HttpException;
use Faculdade\Moinhos\Redirect;

class Router{

    private $routes = []; //LISTA DE ROTAS POSSÍVEIS

    public function add(STRING $method, string $pattern, $callback){
        $method = strtolower($method);
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$method][$pattern] = $callback;
    }

    public function getCurrentUrl(){

        $url = $_SERVER['PATH_INFO'] ?? '/';

        if(strlen($url) > 1){
            $url = rtrim($url, '/');
        }

        return $url;

    }

    public function run(){

        $url = $this->getCurrentUrl();
        $method = strtolower($_SERVER["REQUEST_METHOD"]);

        if(empty($this->routes[$method])) {
            $redirect = new Redirect;
            return $redirect('/error');
            throw new HttpException("Page not fount", 404);    
        }

        foreach($this->routes[$method] as $route => $action){
            if(preg_match($route, $url, $params)){

                // return $action($params);
                return compact('action', 'params');

                // O QUE FAZ O COMPACT
                // [
                //     'action' => $action
                // ]

            }
        }

        
        $redirect = new Redirect;
        return $redirect('/error');
        throw new HttpException("Page not fount", 404);  

    }

}

?>