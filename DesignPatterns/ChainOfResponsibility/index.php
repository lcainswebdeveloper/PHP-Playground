<?php
require __DIR__.'/../../autoload.php';

use DesignPatterns\ChainOfResponsibility\Alarm;
use DesignPatterns\ChainOfResponsibility\Locks;
use DesignPatterns\ChainOfResponsibility\Lights;
use DesignPatterns\ChainOfResponsibility\HomeStatus;
use DesignPatterns\ChainOfResponsibility\HomeChecker;
 
$locks = (new Locks);
$lights = (new Lights);
$alarm = (new Alarm);

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$locks->check(new HomeStatus);
/*
We have the ability to chain calls while giving each request the ability to
end the request or pass up the chain if needed.

We can make a request without knowing how it will be handled.

As long as we specify a successor that will be assigned if the request is met the chain will continue.
We set the chain of successors above.
*/