<?php

namespace App\Controllers;

use App\Models\Student;

class StudentController extends ViewController
{
    /**
     * @var $students
     * @var $student
     * @var $grades
     * @var $sumOfGrades
     * @var $totalGrades
     */
    protected $students, $student, $grades, $totalGrades;

    /**
     * Returns view with list of all students
     *
     * @param Student $student
     */
    public function index(Student $student)
    {
        $this->students = $student->get();

        $this->getView('home');
    }

    /**
     * Return JSON or XML response based on student school board
     *
     * @param Student $student
     */
    public function show(Student $student)
    {
        $this->student = $student->getById($_GET['student_id']);

        $this->sumOfGrades = $student->getSumOfGrades($this->student->id);

        $this->grades = $student->getGrades($this->student->id);

        $this->totalGrades = $student->getTotalGrades($this->student->id);

        $studentId = $this->student->id;
        $studentName = $this->student->firstname . ' ' . $this->student->lastname;
        $averageGrade = $this->sumOfGrades[0] / $this->totalGrades[0];
        $final = $averageGrade >= 7 ? 'PASS' : 'FAIL';

        $this->getResponse($studentId, $studentName, $this->grades, $averageGrade, $final);
    }

    /**
     * Check student school board
     *
     * @param $studentId
     * @param $studentName
     * @param $grades
     * @param $averageGrade
     * @param $final
     */
    private function getResponse($studentId, $studentName, $grades, $averageGrade, $final)
    {
        if ($studentId == 1) {
            header('Content-Type: application/json');

            $data = [
                'student_id' => $studentId,
                'student_name' => $studentName,
                'grades' => $grades,
                'average_grade' => $averageGrade,
                'final' => $final,
            ];
            
            echo json_encode($data);
        } else {
            header("Content-type: text/xml;charset=utf-8");

            $response = '<?xml version="1.0" encoding="utf-8"?>';

            $response .= '<response><student_id>'.$studentId.'</student_id>';
            $response .= '<student_name>'.$studentName.'</student_name>';
            $response .= '<average_grade>'.$averageGrade.'</average_grade>';
            $response .= '<final>'.$final.'</final></response>';

            echo $response;
        }
    }
}