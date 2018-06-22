<?php

require 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

function prepr($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}

function env($key){
    return getenv($key);
}
