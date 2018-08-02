<?php
require __DIR__.'/../../autoload.php';

use DesignPatterns\Strategy\LogToFile;
use DesignPatterns\Strategy\LogToDatabase;
use DesignPatterns\Strategy\Log;
use DesignPatterns\Strategy\LogInterface;
 
class App{
    /*Using polymorphism here means we can get different behaviour without coupling code*/
    public function log($data, LogInterface $logger){
        return $logger->log($data);
    }
}

(new App)->log("some information", new LogToFile);
(new App)->log("some information", new LogToDatabase);
/*
//Define a family of algorithms/tasks
    - LOGGING DATA
        - TO FILE
        - TO DATABASE etc ...

//Make them interchangable at runtime by coding to an interface
*/