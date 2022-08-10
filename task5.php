<?php


$servername = "localhost";
$username = "id17186169_root";
//$username = "root";
$password = "k&V>~Ld0Kvfz?|nZ";
//$password = "";
$conn = new PDO("mysql:host=$servername;dbname=id17186169_ass3task4", $username, $password);
//$conn = new PDO("mysql:host=$servername;dbname=ass3task4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$has_error = false;
$error_msg = "";

$doctors = array();
$show_fee = false;



if (isset($_POST["method"])) {

    if ($_POST["method"] == "add") {
        $test = "add";
        Add();
    }
    if ($_POST["method"] == "update") {
        $test = "update";
        Update();
    }
    if ($_POST["method"] == "delete") {
        $test = "delete";
        Delete();
    }
} else {
    fetchAll();
}

function Add()
{
    try {
        if (empty($_POST["practicenumber"]) || empty($_POST["name"]) || empty($_POST["specialty"]) || empty($_POST["fee"])) {
            $GLOBALS['has_error'] = true;
            $GLOBALS['error_msg'] = "Form Invalid";
            return;
        }

        $GLOBALS['conn']->query("INSERT INTO `doctors`(`practicenumber`, `name`, `specialty`, `fee`) VALUES ({$_POST["practicenumber"]},'{$_POST["name"]}','{$_POST["specialty"]}',{$_POST["fee"]})");
        fetchAll();

    } catch (PDOException $e) {
        $GLOBALS['has_error'] = true;
        $GLOBALS['error_msg'] = "Connection failed: " . $e->getMessage();
        fetchAll();
    }
}

function Update()
{
    try {
        if (empty($_POST["practicenumber"])) {
            $GLOBALS['has_error'] = true;
            $GLOBALS['error_msg'] = "Form Invalid";
            return;
        }
        $sql = "UPDATE `doctors` SET ";
        $added = false;

        if (isset($_POST["name"]) && $_POST["name"] != "") {
            $sql .= " `name` = '{$_POST["name"]}' ";
            $added = true;
        }

        if (isset($_POST["specialty"]) && $_POST["specialty"] != "") {
            if ($added) {
                $sql .= ", `specialty` = '{$_POST["specialty"]}' ";
            } else {
                $sql .= " `specialty` = '{$_POST["specialty"]}' ";
                $added = true;
            }

        }

        if (isset($_POST["fee"]) && $_POST["fee"] != "") {
            if ($added) {
                $sql .= ", `fee` = {$_POST["fee"]} ";
            } else {
                $sql .= " `fee` = {$_POST["fee"]} ";
            }
        }

        $sql .= " WHERE practicenumber = {$_POST["practicenumber"]}";
        if (!$added) {
            $GLOBALS['has_error'] = true;
            $GLOBALS['error_msg'] = "No Fields entered to update.";
        }
        $GLOBALS['test'] = $sql;
        $GLOBALS['conn']->query($sql);
        fetchAll();

    } catch (PDOException $e) {
        $GLOBALS['has_error'] = true;
        $GLOBALS['error_msg'] = "Connection failed: " . $e->getMessage();
        fetchAll();
    }
}

function Delete()
{
    try {
        if (empty($_POST["practicenumber"])) {
            $GLOBALS['has_error'] = true;
            $GLOBALS['error_msg'] = "Form Invalid";
            return;
        }

        $GLOBALS['conn']->query("DELETE FROM `doctors` WHERE `practicenumber` = {$_POST["practicenumber"]}");
        fetchAll();

    } catch (PDOException $e) {
        $GLOBALS['has_error'] = true;
        $GLOBALS['error_msg'] = "Connection failed: " . $e->getMessage();
        fetchAll();
    }
}

function fetchAll()
{
    try {


        $GLOBALS['doctors'] = $GLOBALS['conn']->query("SELECT * FROM doctors");

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
    <h1>Task 5</h1>


    <? if ($has_error): ?>
        <p><?php echo $error_msg ?></p>
    <? else: ?>

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
        <br>
        <br>

    <? endif; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div id="data">
            <div>
                <label for="method">Method</label>
                <select name="method" id="method">
                    <option value="add">Add</option>
                    <option value="update">Update</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div>
                <label for="practicenumber">Practice Number</label>
                <input type="number" id="practicenumber" name="practicenumber">

                <label for="name">Name</label>
                <input type="text" id="name" name="name">

                <label for="specialty">Specialty</label>
                <select id="specialty" name="specialty">
                    <option value="GP">GP</option>
                    <option value="Oncologist">Oncologist</option>
                    <option value="Surgeon">Surgeon</option>
                </select>
                <label for="fee">Fee</label>
                <input type="number" step=".01" id="fee" name="fee">
            </div>
        </div>
        <br>
        <br>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br>
        </div>
    </form>

    <iframe src="task5.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>