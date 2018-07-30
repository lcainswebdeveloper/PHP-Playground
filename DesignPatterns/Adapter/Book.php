<?php

namespace DesignPatterns\Adapter;

class Book implements BookInterface{
    public function open(){
        prepr("Open The Book");
    }

    public function turnPage(){
        prepr("Turn The Page");
    }
}