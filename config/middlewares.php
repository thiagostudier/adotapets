<?php

$app->middleware('before', function ($c){
    // session_start();
});
$app->middleware('before', function ($c){
    // header("Content-Type: text/html");
});
$app->middleware('after', function ($c){
    // echo "after";
});
$app->middleware('after', function ($c){
    // echo "after 2";
});