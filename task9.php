<?php
require('task9Models/company_db.php');

$companies = array();
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_companies';
}

if ($action == 'list_companies') {
    $GLOBALS['companies'] = get_companies();
}
?>

<html lang="en">
<style>

    * {
        box-sizing: border-box;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th, td {
        text-align: left;
        padding: 2px;
        border: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

</style>
<body>
<?php include 'menu.inc'; ?>
<?php include 'task9menu.inc'; ?>
<main>


    <h1>Task 9</h1>

    <h3>Task a</h3>
    <p><b>Problem:</b> I live in an industrial, harbour town. This town is the biggest harbour in the country </p>
    <p>and most of the importing and exporting via vessels takes place here.</p>
    <p>The problem is, all the trucks bring or take away cargo to and from the harbour, damage the roads.</p>
    <p><b>Solution:</b> Introduce a Road Levy system that companies need to pay per truck traveling in this town.</p>
    <p>The levy will be calculated by taking the cost of the damage and dividing it up per truck traveling in the town.</p>
    <p>The system will only concern about the Companies, Trucks and Levy paid on which terms.</p>




    <iframe src="task9.txt" height="500" width="1500">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>

<!--<iframe src="task1.txt" height="400" width="1200">-->
<!--    Your browser does not support iframes. </iframe>-->