<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private const SUPPORTED = ['en', 'hi'];

    public function switch(Request $request, string $locale): RedirectResponse
    {
        abort_unless(in_array($locale, self::SUPPORTED, true), 404);

        $request->session()->put('locale', $locale);

        return redirect()->to(url()->previous() ?: '/');
    }
}
