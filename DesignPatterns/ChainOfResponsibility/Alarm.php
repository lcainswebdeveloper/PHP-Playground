<?php

namespace DesignPatterns\ChainOfResponsibility;

class Alarm extends HomeChecker{
    
    public function check(HomeStatus $home){
        if(!$home->alarmOn):
            throw new \Exception("Alarm was not set. ABORT!!");
        endif;

        $this->next($home);
    }

}