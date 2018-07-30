<?php

namespace DesignPatterns\Adapter;

class Kobo implements EReaderInterface{
    public function turnOn(){
        prepr("Turn Kobo On");
    }

    public function pressNextButton(){
        prepr("Click on the next book on the kobo");
    }
}