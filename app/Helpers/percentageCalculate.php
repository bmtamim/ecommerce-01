<?php

if (!function_exists('percentageCalculate')) {

    /**
     * description
     *
     * @param $firstValue
     * @param $secondValue
     * @return void
     */
    function percentageCalculate($firstValue = 0,$secondValue = 0) : float | int
    {
        $comparedValue = ($firstValue - $secondValue);
        $prePercentage = ($comparedValue / $firstValue);
        $percentage = ($prePercentage * 100);
        return number_format($percentage,'2','.',',');
    }
}
