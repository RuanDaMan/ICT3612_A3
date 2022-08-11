<?php

$square = null;
$side_length = 1;

class Square
{

    public $name;
    public $side_length;

    public function __construct($side_length)
    {
        $this->side_length = $side_length;
        $this->name = 'Square';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSideLength()
    {
        return $this->side_length;
    }

    public function setSideLength($side_length)
    {
        $this->side_length = $side_length;
    }

    public function getArea()
    {
        return $this->side_length * $this->side_length;
    }

    public function getPerimeter()
    {
        return $this->side_length * 4;
    }
}

if (isset($_POST["side_length"])) {
    $side_length = $_POST["side_length"];
    $square = new Square($side_length);
}

?>


<html lang="en">
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 2</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div id="data">

            <label>Side Length:
                <input type="number" name="side_length" step="1">
            </Label>
        </div>
        <input type="submit" value="Submit"><br>
    </form>

    <?php if ($square != null): ?>
        <ul>
            <li>getName() | <?php echo $square->getName() ?></li>
            <li>getSideLength() | <?php echo $square->getSideLength() ?></li>
            <li>getArea() | <?php echo $square->getArea() ?></li>
            <li>getPerimeter() | <?php echo $square->getPerimeter() ?></li>
            <li>setSideLength | <?php

                if (isset($_POST['side_length']) && isset($_POST['set_side_length'])) {
                    $square->setSideLength($_POST['side_length']);
                }

                ?>

                <form method="post">
                    <label> Side Length:
                        <input type="number" name="side_length" value="<?php echo $side_length ?>"/>
                    </label>

                    <input type="submit" name="set_side_length" value="Set"/>
                </form>
            </li>
        </ul>
    <?php endif; ?>

    <iframe src="task2.txt" height="400" width="1200">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>