<?php

namespace DesignPatterns\Adapter;

class EReaderAdapter implements BookInterface{
    private $reader;

    public function __construct(EReaderInterface $reader){
        $this->reader = $reader;
    }

    public function open(){
        return $this->reader->turnOn();
    }

    public function turnPage(){
        return $this->reader->pressNextButton();
    }
}