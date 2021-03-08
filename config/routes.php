<?php

// HOME DO SITE
$router->add('GET', '/', '\App\Controllers\SiteController::index');
$router->add('GET', '/sobre', '\App\Controllers\SiteController::about');
$router->add('GET', '/contato', '\App\Controllers\SiteController::contato');
$router->add('POST', '/send/contato', '\App\Controllers\SiteController::send_contato');

// ERROR 404
$router->add('GET', '/error', '\App\Controllers\SiteController::error');
// PET
$router->add('GET', '/pet/(\d+)', '\App\Controllers\SiteController::pet');
$router->add('GET', '/search/(\d+)', '\App\Controllers\SiteController::pet');
$router->add('POST', '/search', '\App\Controllers\SiteController::search');
// ONG
$router->add('GET', '/ongs', '\App\Controllers\SiteController::ongs');
$router->add('GET', '/ong/(\w+)', '\App\Controllers\SiteController::ong');
// LOGIN
$router->add('GET', '/entrar', '\App\Controllers\SiteController::entrar');
$router->add('POST', '/login', '\App\Controllers\UserController::login');
$router->add('POST', '/user/register', '\App\Controllers\UserController::store');
$router->add('GET', '/logout', '\App\Controllers\UserController::logout');

if( $container['users_model']->ifLogin() ){
    // ONGS
    $router->add('GET', '/user/ongs', '\App\Controllers\UserController::ongs');
    $router->add('POST', '/ong/register', '\App\Controllers\OngController::store');
    $router->add('POST', '/ong/register/(\d+)/image', '\App\Controllers\OngController::image');
    $router->add('GET', '/user/ong/(\d+)/edit', '\App\Controllers\OngController::edit');
    $router->add('POST', '/ong/(\d+)/edit', '\App\Controllers\OngController::update');
    $router->add('POST', '/ong/(\d+)/delete', '\App\Controllers\OngController::delete'); 
    // PETS
    $router->add('GET', '/user/ong/(\d+)/pets', '\App\Controllers\PetController::index');
    $router->add('POST', '/ong/(\d+)/pet/register', '\App\Controllers\PetController::store');
    $router->add('POST', '/pet/register/(\d+)/image', '\App\Controllers\PetController::image');
    $router->add('GET', '/user/pet/(\d+)/edit', '\App\Controllers\PetController::edit');
    $router->add('POST', '/pet/(\d+)/edit', '\App\Controllers\PetController::update');
    $router->add('POST', '/pet/(\d+)/galeria', '\App\Controllers\PetController::galeria');
    $router->add('GET', '/galeria/(\d+)/delete', '\App\Controllers\PetController::delete_item_galeria');

};