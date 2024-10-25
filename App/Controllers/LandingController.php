<?php

namespace App\Controllers;

class LandingController
{
    public function index()
    {
        return view('layout/landing'); // Assegura't que aquest camí sigui correcte
    }
}