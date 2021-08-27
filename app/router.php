<?php

use App\Controllers\HomeController;
use App\Models\Student;

$request = $_SERVER['REQUEST_URI'];

$homeController = new HomeController();
$student = new Student();

switch ($request) {
    case '/test/' :
        $homeController->index($student);
        break;
    case '/test/student?student_id=' . $_GET['student_id'] :
        $homeController->show($student);
        break;
    default:
        http_response_code(404);
        die('Page not found');
        break;
}