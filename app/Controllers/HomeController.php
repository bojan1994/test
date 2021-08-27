<?php

namespace App\Controllers;

use App\Models\Student;

class HomeController extends ViewController
{
    /**
     * @var $students
     * @var $student
     */
    protected $students, $student;

    public function index(Student $student)
    {
        $this->students = $student->get();

        $this->getView('home');
    }

    public function show(Student $student)
    {
        $this->student = $student->getById($_GET['student_id']);

        var_dump($this->student);
    }
}