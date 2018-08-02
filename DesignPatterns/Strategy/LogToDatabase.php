<?php

namespace DesignPatterns\Strategy;

class LogToDatabase extends Log implements LogInterface{
    
    public function log($data){
        prepr("Log To DB");
    }

}