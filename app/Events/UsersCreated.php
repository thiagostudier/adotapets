<?php

namespace App\Events;

class UsersCreated{

    // INVOKE PARA QUE A CLASSE FUNCIONE COMO UMA FUNÇÃO     
    public function __invoke($e){
        
        $event = $e->getName();
        $params = $e->getParams();
        echo sprintf('Disparado evento "%s",  com parâmetros: %s', $event, json_encode($params));

    }

}
