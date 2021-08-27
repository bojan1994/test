<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School board</title>
</head>
<body>
    <div class="container">
        <h1>List of students</h1>
        <ul>
        <?php
        foreach ($this->students as $student) {
            $schoolBoard = $student->school_board_id == 1 ? 'CSM' : 'CSMB';
            ?>
            <li><a href="/test/student/<?php echo $student->id; ?>"><?php echo $student->firstname; ?> <?php echo $student->lastname; ?> - <?php echo $schoolBoard; ?></a></li>
            <?php
        }
        ?>
        </ul>
    </div>
</body>
</html>