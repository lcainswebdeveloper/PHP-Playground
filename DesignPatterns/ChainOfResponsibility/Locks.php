<?php

namespace DesignPatterns\ChainOfResponsibility;

class Locks extends HomeChecker{
    
    public function check(HomeStatus $home){
        if(!$home->locked):
            throw new \Exception("Doors are not locked. ABORT!!");
        endif;

        $this->next($home);
    }

}