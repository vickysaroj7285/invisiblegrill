<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $slides = [
            ['img' => 'slide1.jpg', 'kicker' => 'slide1Kicker', 'title' => 'slide1Title', 'sub' => 'slide1Sub'],
            ['img' => 'slide2.jpg', 'kicker' => 'slide2Kicker', 'title' => 'slide2Title', 'sub' => 'slide2Sub'],
            ['img' => 'slide3.jpg', 'kicker' => 'slide3Kicker', 'title' => 'slide3Title', 'sub' => 'slide3Sub'],
        ];

        return view('home', compact('slides'));
    }
}
