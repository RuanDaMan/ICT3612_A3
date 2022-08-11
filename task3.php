<?php

class AssignmentRecord
{
    private $student_number;
    private $assignment_1_mark;
    private $assignment_2_mark;
    private $assignment_3_mark;

    const ass_1_weight = .1;
    const ass_2_weight = .1;
    const ass_3_weight = .8;

    public function __constructor($student_number, $assignment_1_mark, $assignment_2_mark, $assignment_3_mark)
    {
        $this->student_number = $student_number;
        $this->assignment_1_mark = $assignment_1_mark;
        $this->assignment_2_mark = $assignment_2_mark;
        $this->assignment_3_mark = $assignment_3_mark;
    }

    public function getYearMark() {
        return ($this->assignment_1_mark * self::ass_1_weight) + ($this->assignment_2_mark * self::ass_2_weight) + ($this->assignment_3_mark * self::ass_3_weight);
    }
    public function __toString()
    {
        return "$this->student_number,$this->assignment_1_mark,$this->assignment_2_mark,$this->assignment_3_mark,";
    }

}

class FullRecord extends AssignmentRecord {
    private $exam_mark;

    public function __construct($student_number, $assignment_1_mark, $assignment_2_mark, $assignment_3_mark, $exam_mark)
    {
       parent::__constructor($student_number, $assignment_1_mark, $assignment_2_mark, $assignment_3_mark);
        $this->exam_mark = $exam_mark;
    }
    public function __toString()
    {
        return parent::__toString() . ",$this->exam_mark";
    }
}

$testFullRecord = new FullRecord("69723400", 70,80,50,55)


?>


<html lang="en">
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 3</h1>
    A new FullRecord class is created: $testFullRecord = new FullRecord("69723400", 70,80,50,55)
    <ul>
        <li>Year Mark: <?php echo $testFullRecord->getYearMark(); ?></li>
        <li>To String: <?php echo $testFullRecord->__toString(); ?></li>
    </ul>

    <iframe src="task3.txt" height="500" width="1500">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>