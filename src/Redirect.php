<?php

namespace Faculdade\Moinhos;

class Redirect{

    public function __invoke($url){
        header('Location: ' . $url);
        exit();
    }

}