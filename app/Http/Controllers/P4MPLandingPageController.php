<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class P4MPLandingPageController extends Controller
{
    public function index()
    {
        
        return view('landingPage.p4mp.index');
    }
}
