<?php


$servername = "localhost";
$username = "id17186169_root";
$password = "k&V>~Ld0Kvfz?|nZ";

$has_error = false;
$error_msg = "";

$doctors = array();
$show_fee = false;




if (isset($_POST["view"])) {

    if (isset($_POST["fee"])) {
        $GLOBALS['doctors'] = fetchAll($_POST["view"], $_POST["fee"]);
    } else {
        $GLOBALS['doctors'] = fetchAll($_POST["view"]);
    }
}


function fetchAll($view_mode, $fee = 0)
{
    try {
        $servername = $GLOBALS['servername'];
        $username = $GLOBALS['username'];
        $password = $GLOBALS['password'];
        $conn = new PDO("mysql:host=$servername;dbname=id17186169_ass3task4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($view_mode == "all") {

            return $conn->query("SELECT * FROM doctors");
        } elseif ($view_mode == "below_fee") {

            return $conn->query("SELECT * FROM doctors WHERE fee < {$fee}");
        } else {

            echo "View Mode: {$view_mode}";
        }
    } catch (PDOException $e) {
        $GLOBALS['has_error'] = true;
        $GLOBALS['error_msg'] = "Connection failed: " . $e->getMessage();
    }
}


?>


<html>
<body>
<?php include 'menu.inc'; ?>
<main>
    <h1>Task 4</h1>


    <? if ($has_error): ?>
        <p><?php echo $error_msg ?></p>
    <? else: ?>


        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div id="data">
                <div>
                    <label for="view">View Mode</label>
                    <select onchange="" name="view" id="view">
                        <option value="all">All</option>
                        <option value="below_fee">Below Fee</option>
                    </select>


                    <label for="fee">Fee:</label>
                    <input type="number" step=".01" id="fee" name="fee">

                </div>
            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Submit"><br>
            </div>
        </form>

        <?php ?>
        <table>
            <thead>
            <tr>
                <th>Practice Number</th>
                <th>Name</th>
                <th>Specialty</th>
                <th>Fee</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($doctors as $doctor) { ?>
                <tr>
                    <td><?php echo $doctor['practicenumber']; ?></td>
                    <td><?php echo $doctor['name'] ?></td>
                    <td><?php echo $doctor['specialty']; ?></td>
                    <td><?php echo $doctor['fee']; ?></td>
                </tr>

            <?php } ?>

            </tbody>
        </table>

    <? endif; ?>

    <iframe src="task4.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>