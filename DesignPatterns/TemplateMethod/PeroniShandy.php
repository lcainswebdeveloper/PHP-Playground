<?php

namespace DesignPatterns\TemplateMethod;

class PeroniShandy extends PeroniTemplate{

    public function orderRelevantPeroniDrink(){
        prepr('order a Peroni with Lemonade in it because its a shandy');
        return $this;
    }

}