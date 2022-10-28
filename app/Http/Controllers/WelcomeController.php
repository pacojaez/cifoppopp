<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     /*
    * fallback route in web.php
    */
    public function index(){
        return view( 'welcome' );
    }
}
