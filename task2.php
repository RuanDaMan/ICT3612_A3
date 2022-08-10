<?php
$student_name = '';

$show_form = true;
if (isset($_GET['student_name'])) {

    $show_form = false;
    $student_name = $_GET['student_name'];
}


$num_modules = 0;

if (isset($_GET['num_modules'])) {
    $num_modules = $_GET['num_modules'];
}


$bursary_amount = 0;

if (isset($_GET['bursary_amount'])) {
    $bursary_amount = $_GET['bursary_amount'];
}


const cost_per_module = 1825;

$total_fee = cost_per_module * $num_modules;
$outstanding_fee = $total_fee - $bursary_amount;


?>


<html>
<body>
<?php include 'menu.inc';?>

<main>
    <h1>Task 2</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

        <div id="data">
            <label>Student Name:</label>
            <input type="text" name="student_name"><br>

            <label>Number of Modules Registered:</label>
            <input type="number" name="num_modules"><br>

            <label>Bursary Amount:</label>
            <input type="number" name="bursary_amount"><br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br>
        </div>

    </form>
    <div>
        <label>Student Name :</label>
        <span><?php echo $student_name; ?></span>
        <br>

        <label>Number of modules registered:</label>
        <span><?php echo $num_modules ?></span>
        <br>

        <label>Cost Per Module:</label>
        <span>R <?php echo cost_per_module ?></span>
        <br>

        <label>Total Fee:</label>
        <span>R <?php echo $total_fee; ?></span>
        <br>

        <label>Bursary Amount:</label>
        <span>R <?php echo $bursary_amount; ?></span>
        <br>

        <label>Outstanding Fee:</label>
        <span>R <?php echo $outstanding_fee; ?></span>
        <br>


    </div>

    <br>
    <br>
    <br>
    <br>

    <iframe src="task2.txt" height="500" width="500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>