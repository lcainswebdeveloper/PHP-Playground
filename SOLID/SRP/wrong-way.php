<?php

class BadSalesReporter{
    public function report($saleAmounts){
        $sales = $this->calculateSales($saleAmounts);

        return $this->format($sales);
    }

    /*We should not be responsible for having a method for calculating the sales in here*/
    protected function calculateSales($saleAmounts){
        return array_sum($saleAmounts);
    }

    /*We should not be responsible for deciding the output method in here*/
    protected function format($sales){
        return "<h1>Sales Price: ".$sales."</h1>";
    }
}
