<?php

namespace App\Controllers;

use App\Models\Student;

class HomeController extends ViewController
{
    /**
     * @var $students
     */
    protected $students;

    public function index(Student $student)
    {
        $this->students = $student->get();

        $this->getView('home');
    }
}