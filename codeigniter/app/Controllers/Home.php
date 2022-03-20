<?php

namespace App\Controllers;

use App\Controllers\CandidatoController;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        return view('candidatos');
    }
}
