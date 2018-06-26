<?php
require __DIR__.'/../../autoload.php';

use Tools\CSV\CsvReader;
$sampleData = file_get_contents(__DIR__.'/sample.csv');

$reader = new CsvReader;
$reader->readAsString($sampleData);
prepr($reader->parse());