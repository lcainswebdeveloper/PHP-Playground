<?php

namespace DesignPatterns\ChainOfResponsibility;

class Lights extends HomeChecker{
    
    public function check(HomeStatus $home){
        if(!$home->lightsOff):
            throw new \Exception("Lights are still on. ABORT!!");
        endif;

        $this->next($home);
    }

}