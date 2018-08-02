<?php

namespace DesignPatterns\TemplateMethod;

abstract class PeroniTemplate{
    
    /*We need this to do our job correctly*/
    protected abstract function orderRelevantPeroniDrink();

    public function drink(){
        return $this->goToPub()
                    ->orderRelevantPeroniDrink() //this is the changeable method that must be provided in all subclasses
                    ->payForIt()
                    ->drinkIt();
    }

    public function goToPub(){
        prepr('go to the Three Swans');
        return $this;
    }

    public function payForIt(){
        prepr('Pay probably way too much');
        return $this;
    }

    public function drinkIt(){
        prepr('Drink and enjoy!');
        return $this;
    }
}