<?php

namespace App\Controller;

use App\Service\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/{number}", name="home")
     */
    public function index($number, NumberFormatter $formatter)
    {
        return new Response($formatter->formatNumber($number));
    }
}
