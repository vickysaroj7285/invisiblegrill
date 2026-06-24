<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function sitemap(): Response
    {
        return response()
            ->view('sitemap')
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        return response()
            ->view('robots')
            ->header('Content-Type', 'text/plain');
    }
}
