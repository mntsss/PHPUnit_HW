<?php

namespace App\Tests;

use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    private $numberFormatter;

    public function __construct()
    {
        $this->numberFormatter = new NumberFormatter();
        parent::__construct();
    }


    public function testMillions()
    {
        $array = array(
            "2835779" => "2.84M",
            "999500" => "1.00M",
            "-1255463.65" => "-1.26M",
            "-23445235" => "-23.45M",
            "94234553.6523" => "94.23M" );
        foreach($array as $num => $expected)
            $this->assertEquals($expected, $this->numberFormatter->formatNumber((float)$num));
    }

    public function testHundredsThausands()
    {
        $array = array(
            "535216" => "535K",
            "99950" => "100K",
            "-125630.65" => "-126K",
            "-234453" => "-234K",
            "942233.6523" => "942K" );
        foreach($array as $num => $expected)
            $this->assertEquals($expected, $this->numberFormatter->formatNumber((float)$num));
    }

    public function testThausands()
    {
        $array = array(
            "27533.78" => "27 534",
            "999.9999" => "1 000",
            "-1256.65" => "-1 257",
            "-2344" => "-2 344",
            "94223.6523" => "94 224" );
        foreach($array as $num => $expected)
            $this->assertEquals($expected, $this->numberFormatter->formatNumber((float)$num));
    }

    public function testSmaller()
    {
        $array = array(
            "533.1" => "533.10",
            "66.6666" => "66.67",
            "-126.652" => "-126.65",
            "-23.4" => "-23.40",
            "999.99" => "999.99" );
        foreach($array as $num => $expected)
            $this->assertEquals($expected, $this->numberFormatter->formatNumber((float)$num));
    }
}
