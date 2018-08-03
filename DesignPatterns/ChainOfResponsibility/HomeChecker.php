<?php

namespace DesignPatterns\ChainOfResponsibility;

abstract class HomeChecker{
    protected $successor;

    abstract public function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor){
        $this->successor = $successor; //firstly lights, then alarm
    }

    public function next(HomeStatus $home){
        if($this->successor):
            $this->successor->check($home);
        endif;
    }
}