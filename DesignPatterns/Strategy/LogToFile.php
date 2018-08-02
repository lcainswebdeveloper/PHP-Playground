<?php

namespace DesignPatterns\Strategy;

class LogToFile extends Log implements LogInterface{

    public function log($data){
        prepr("Log To File");
    }

}