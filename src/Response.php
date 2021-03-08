<?php

namespace Faculdade\Moinhos;

use Symfony\Component\HttpFoundation\Request;

// CAMADA DE RENDERIZAÇÃO / CAMADA DE VIEW
// CLASSE USADA PARA INTERMEDIAÇÃO ENTRE A ROTA E O VIEW
class Response{

    // PERMITE QUE O RESPONSE SEJA USADO COMO UMA FUNÇÃO ANÔNIMA
    // PODE EXECUTAR A CLASSE RESPONSE COMO SE FOSSE UMA FUNÇÃO
    public function __invoke($action, $params){

        parse_str(file_get_contents('php://input'), $_POST);

        // PARAMETROS DA ROTA
        $request = new Request(
            $_GET,
            $_POST,
            $params['params'],
            $_COOKIE,
            $_FILES,
            $_SERVER
        );
        
        $params['params'] = $request;

        if(is_string($action)){

            // EXPLODE
            // \App\Controllers\SiteController::show    =>   ['\App\Controllers\SiteController','show']
            $action = explode('::', $action);
            $action[0] = new $action[0];

        }

        $response = call_user_func_array($action, $params);

        if(is_array($response)){
            $response = json_encode($response);
        }

        echo $response;

    }

}