<?php
require __DIR__.'/../../autoload.php';

use DesignPatterns\TemplateMethod\Peroni;
use DesignPatterns\TemplateMethod\PeroniShandy;

(new Peroni)->drink();
(new PeroniShandy)->drink();

/*Assuming we have 2 similar classes with similar functionality,
we will use inheritance from a parent abstract class.SendGrid
The called method (drink() in this case) will do everything and call to an abstract method:
orderRelevantPeroniDrink() which will then force us to provide this in any subclasses.
*/