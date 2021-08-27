<?php

namespace App\Models;

use App\Config\Database;

class Student
{
    /**
     * @var $conn
     */
    protected $conn;

    /**
     * Student constructor
     */
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    /**
     * Fetch all students
     *
     * @return array
     */
    public function get()
    {
        $st = $this->conn->prepare('SELECT * FROM students');
        $st->execute();
        $output = [];
        while ($row = $st->fetch(\PDO::FETCH_OBJ)) {
            $output[] = $row;
        }
        return $output;
    }

    /**
     * Get student by id
     *
     * @param $id
     * @return mixed|string
     */
    public function getById($id)
    {
        $st = $this->conn->prepare('SELECT * FROM students WHERE id = ?');
        $st->bindParam(1, $id);
        $st->execute();
        $output = '';
        while ($row = $st->fetch(\PDO::FETCH_OBJ)) {
            $output = $row;
        }
        return $output;
    }

    /**
     * Fetch all students grades
     *
     * @param $studentId
     * @return array
     */
    public function getGrades($studentId)
    {
        $st = $this->conn->prepare('SELECT grade FROM grades WHERE student_id = ?');
        $st->bindParam(1, $studentId);
        $st->execute();
        $output = [];
        while ($row = $st->fetch(\PDO::FETCH_OBJ)) {
            $output[] = $row;
        }
        return $output;
    }

    /**
     * Get sum of total student grades
     *
     * @param $studentId
     * @return mixed|string
     */
    public function getSumOfGrades($studentId)
    {
        $st = $this->conn->prepare('SELECT SUM(grade) FROM grades WHERE student_id = ?');
        $st->bindParam(1, $studentId);
        $st->execute();
        $output = '';
        while ($row = $st->fetch(\PDO::FETCH_NUM)) {
            $output = $row;
        }
        return $output;
    }

    /**
     * Get count of total students grades
     *
     * @param $studentId
     * @return mixed|string
     */
    public function getTotalGrades($studentId)
    {
        $st = $this->conn->prepare('SELECT COUNT(*) FROM grades WHERE student_id = ?');
        $st->bindParam(1, $studentId);
        $st->execute();
        $output = '';
        while ($row = $st->fetch(\PDO::FETCH_NUM)) {
            $output = $row;
        }
        return $output;
    }
}