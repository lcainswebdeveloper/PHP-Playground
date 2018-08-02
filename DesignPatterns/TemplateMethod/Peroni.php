<?php

namespace DesignPatterns\TemplateMethod;

class Peroni extends PeroniTemplate{
    
    public function orderRelevantPeroniDrink(){
        prepr('order a Peroni');
        return $this;
    }

}