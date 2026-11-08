<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthPageController extends Controller
{
    public function login(): View
    {
        return view('halaman.login');
    }
}
