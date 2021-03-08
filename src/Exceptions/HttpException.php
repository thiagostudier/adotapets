<?php

namespace Faculdade\Moinhos\Exceptions;

// TODA CLASSE DE EXCEPTION DEVE EXTENDER (HERDAR) O \EXCEPTION PADRÃO DO PHP 
class HttpException extends \Exception{
    
    public function __construct($message, $code, \Exception $previous = null){

        \http_response_code($code);
        parent::__construct($message, $code, $previous); // CONSTRUTOR DA CLASSE PRINCIPAL

    }

}