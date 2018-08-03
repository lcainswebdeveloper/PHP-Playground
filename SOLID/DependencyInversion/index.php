<?php
require __DIR__.'/../../autoload.php';

interface ConnectionInterface{
    public function connect();
}

class DBConnection implements ConnectionInterface{
    public function connect(){
        return "DATABASE CONNECTION";
    }
}

class PasswordReminder{
    private $dbConnection;

    public function __construct(ConnectionInterface $dbConnection){
        $this->dbConnection = $dbConnection;
    }

    public function reset(){
        return $this->dbConnection->connect();
    }
}

echo (new PasswordReminder(new DBConnection))->reset();