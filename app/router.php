<?php

use App\Controllers\HomeController;

$request = $_SERVER['REQUEST_URI'];

$homeController = new HomeController();

switch ($request) {
    case '/test/' :
        $homeController->index();
        break;
    default:
        http_response_code(404);
        die('Page not found');
        break;
}