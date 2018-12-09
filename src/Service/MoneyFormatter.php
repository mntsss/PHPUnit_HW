<?php
/**
 * Created by PhpStorm.
 * User: mantas
 * Date: 18.12.9
 * Time: 08.27
 */

namespace App\Service;


class MoneyFormatter
{
    private $numberFormatter;


    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur($number): string
    {
        return $this->numberFormatter->formatNumber($number)." €";
    }

    public function formatUsd($number): string {
        return "$".$this->numberFormatter->formatNumber($number);
    }
}