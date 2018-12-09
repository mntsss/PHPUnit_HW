<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.9
 * Time: 05.54
 */

namespace App\Service;


class NumberFormatter
{

    public function formatNumber(float $number): string
    {
        switch ($number){
            case $number >= 999500 || $number <= -999500:
                return $this->roundMillions($number);
            case $number >= 99500 || $number <= -99500:
                return $this->roundHundredThausands($number);
            case round($number,2) >= 1000 || round($number,2) <= -1000:
                return $this->roundThausands($number);
            default:
                return $this->roundSmaller($number);
        }
    }

    private function roundMillions($number): string
    {
        return number_format((float)$number/1000000, 2, ".", '')."M";
    }

    private function roundHundredThausands($number): string
    {
        return number_format((float)$number/1000, 0)."K";
    }

    private function roundThausands($number): string
    {
        return number_format((float)$number, 0, ".", " ");
    }

    private function roundSmaller($number): string
    {
        return $this->addZero((string)round($number, 2));
    }

    private function addZero(string $num):string
    {
        if(strpos($num, "."))
            if(strlen(explode(".",$num)[1]) < 2)
                $num .= "0";

        return $num;
    }
}