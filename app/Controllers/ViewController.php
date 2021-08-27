<?php

namespace App\Controllers;

class ViewController
{
    /**
     * Returning views
     *
     * @param $view
     */
    public function getView($view)
    {
        require_once 'app/Views/' . $view . '.php';
    }
}