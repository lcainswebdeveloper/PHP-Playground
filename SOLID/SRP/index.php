<?php
require __DIR__.'/../../autoload.php';

require 'wrong-way.php';
require 'right-way.php';

echo (new BadSalesReporter)->report([20,300,450]);
echo (new CorrectSalesReporter)->report(new DBRepository, [20,300,450], new HTMLOutput);
echo (new CorrectSalesReporter)->report(new DBRepository, [22,320,458], new UppercaseOutput);