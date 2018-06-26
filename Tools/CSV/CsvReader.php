<?php
namespace Tools\CSV;

/*
composer require kzykhys/php-csv-parser
*/
use KzykHys\CsvParser\CsvParser;

class CsvReader{
    protected $parser;
    protected $results = [];
    public function __construct(){
    }

    public function readAsString($csvString){
        $this->parser = CsvParser::fromString($csvString);
    }

    protected function mapHeadings(){
        $results = $this->parser->parse();

        $headings = $results[0];
        $new = [];
        array_shift($results);
        foreach($results as $key => $result):
            foreach($result as $k => $val):
                if(isset($headings[$k])):
                    $new[$key][$headings[$k]] = $val;
                endif;
            endforeach;
        endforeach;
        $this->results = $new;
    }

    public function parse(){
        $this->mapHeadings();
        return $this->results;
    }
}