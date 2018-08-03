<?php
class DBRepository{
    public function getSales(Array $saleAmounts){
        return array_sum($saleAmounts); //Stub for real DB call
    }
}

interface OutputInterface{
    public function format($sales);
}

class HTMLOutput implements OutputInterface{
    public function format($sales){
        return "<h1>Sales Price: ".$sales."</h1>";
    }
}

class UppercaseOutput implements OutputInterface{
    public function format($sales){
        return strtoupper("<h1>Sales Price: ".$sales."</h1>");
    }
}

class CorrectSalesReporter{
    /*This class should not need to change in it's current state*/
    public function report(DBRepository $repo, $saleAmounts, OutputInterface $formatter){
        $sales = $repo->getSales($saleAmounts);
        return $formatter->format($sales);
    }
}
