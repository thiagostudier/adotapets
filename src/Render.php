<?php

namespace Faculdade\Moinhos;

class Render{

    public function __invoke($content, $template, array $data = []){
        $content = __DIR__ . '/../resources/views/' . $content . '.tpl.php';
        include __DIR__ . '/../resources/views/' . $template . '.tpl.php';
    }

}