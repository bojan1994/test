<?php

namespace App\Models;

use App\Config\Database;

class Student
{
    /**
     * Fetch all students
     *
     * @return array
     */
    public function get()
    {
        $conn = Database::getConnection();
        $st = $conn->prepare('SELECT * FROM students');
        $st->execute();
        $output = [];
        while ($row = $st->fetch(\PDO::FETCH_OBJ)) {
            $output[] = $row;
        }
        return $output;
    }
}