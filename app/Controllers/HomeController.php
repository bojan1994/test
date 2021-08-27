<?php

namespace App\Controllers;

class HomeController extends ViewController
{
    public function index()
    {
        $this->getView('home');
    }
}