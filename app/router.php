<?php

use App\Controllers\StudentController;
use App\Models\Student;

$request = $_SERVER['REQUEST_URI'];

$studentController = new StudentController();
$student = new Student();

switch ($request) {
    case '/test/' :
        $studentController->index($student);
        break;
    case '/test/student?student_id=' . $_GET['student_id'] :
        $studentController->show($student);
        break;
    default:
        http_response_code(404);
        die('Page not found');
        break;
}