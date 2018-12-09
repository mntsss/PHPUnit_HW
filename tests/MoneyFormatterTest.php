<?php

namespace App\Tests;

use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function provideData()
    {
        return [
            ["-125630.65", "-126K", "-126K €" ,"$-126K"],
            ["2835779", "2.84M", "2.84M €" ,"$2.84M"],
            ["66.6666", "66.67", "66.67 €", "$66.67"]
        ];
    }

    /**
     * @dataProvider provideData
     * @param $number
     * @param $formatted
     * @param $euro
     * @param $dollar
     */
    public function testMoneyFormatter($number, $formatted, $euro, $dollar)
    {
        $array = array(
            "2835779" => "2.84M €",
            "999500" => "1.00M €",
            "-1255463.65" => "-1.26M €",
            "-23445235" => "-23.45M €",
            "94234553.6523" => "94.23M €" );

            $mockNumberFormatter = $this->createMock(NumberFormatter::class);
            $mockNumberFormatter->expects($this->exactly(2))
                ->method("formatNumber")
                ->willReturn($formatted);

            $moneyFormatter = new MoneyFormatter($mockNumberFormatter);

            $this->assertEquals($euro, $moneyFormatter->formatEur($number));
        $this->assertEquals($dollar, $moneyFormatter->formatUsd($number));

    }
}
