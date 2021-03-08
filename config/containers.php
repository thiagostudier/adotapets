<?php

use Pimple\Container;

$container = new Container();

$container['events'] = function(){
    return new Zend\EventManager\EventManager;
};

$container['db'] = function(){
    
    // $dsn = 'mysql:host=localhost;dbname=doguinho';
    // $username = 'root';
    // $password = '';
    $dsn = 'mysql:host=mysql.adotapets.com.br;dbname=adotapets';
    $username = 'adotapets';
    $password = 'mklxmklx13';
    $options = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ];

    $pdo = new \PDO($dsn, $username, $password, $options);

    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $pdo;

};

$container['conn'] = function(){

    return new mysqli('localhost', 'root', '', 'site-faculdade-moinhos');

};

$container['users_model'] = function ($c) {
    return new \App\Models\Users($c);
};

$container['pets_model'] = function ($c) {
    return new \App\Models\Pets($c);
};

$container['ongs_model'] = function ($c) {
    return new \App\Models\Ongs($c);
};

$container['ongs_users_model'] = function ($c) {
    return new \App\Models\UserOngs($c);
};

$container['site_model'] = function ($c) {
    return new \App\Models\Site($c);
};

$container['galerias_model'] = function ($c) {
    return new \App\Models\Galerias($c);
};
