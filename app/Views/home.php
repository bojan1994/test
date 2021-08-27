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
            <li>
                <?php echo $student->firstname; ?> <?php echo $student->lastname; ?> - <?php echo $schoolBoard; ?>
                <form action="/test/student" method="GET">
                    <input type="hidden" name="student_id" value="<?php echo $student->id; ?>"/>
                    <button type="submit">Calculate grades</button>
                </form>
            </li>
            <?php
        }
        ?>
        </ul>
    </div>
</body>
</html>