<?php

namespace DesignPatterns\Adapter;

class Kindle implements EReaderInterface{
    public function turnOn(){
        prepr("Turn Kindle On");
    }

    public function pressNextButton(){
        prepr("Click on the next book");
    }
}