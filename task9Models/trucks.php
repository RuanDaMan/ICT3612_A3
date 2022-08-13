<?php
require('trucks_db.php');
require('company_db.php');

$trucks = array();
$companies = get_companies();
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_trucks';
}

if ($action == 'list_trucks') {
    $GLOBALS['trucks'] = get_trucks();
} elseif ($action == 'delete_truck') {
    delete_truck($_POST['truck_id']);
    $GLOBALS['trucks'] = get_trucks();
} elseif ($action == 'add_truck') {
    add_truck($_POST['company_id'], $_POST['truck_name']);
    $GLOBALS['trucks'] = get_trucks();
}


?>

<html lang="en">
<style>

    * {
        box-sizing: border-box;
    }

    .row {
        margin-left: -2px;
        margin-right: -2px;
    }

    .column {
        float: left;
        width: 50%;
        padding: 2px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
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
<?php include '../menu.inc'; ?>

<main>
    <?php include 'task9menu.inc'; ?>

    <div class="row">
        <div class="column">
            <h3>Trucks</h3>
            <div>
                <form action="" method="post">
                    <input type="hidden" name="action" value="add_truck"/>
                    <label>Truck Name:
                        <input name="truck_name"/>
                    </label>
                    <label>Companies:
                        <select name="company_id">
                            <option value="">-----------------</option>
                            <?php foreach ($companies as $company) { ?>
                                <option value="<?php echo $company['CompanyID'];?>"><?php echo $company['CompanyName']; ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <input style="margin: auto" type="submit" value="Add"/>
                </form>
            </div>
            <table>
                <thead>
                <tr>
                    <th style="text-align: left">TruckID</th>
                    <th style="text-align: left">TruckName</th>
                    <th style="text-align: left">CompanyID</th>
                    <th style="text-align: left">CompanyName</th>
                    <th style="text-align: left">Actions</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($trucks as $truck) { ?>
                    <tr>
                        <td><?php echo $truck['TruckID']; ?></td>
                        <td><?php echo $truck['TruckName'] ?></td>
                        <td><?php echo $truck['CompanyID'] ?></td>
                        <td><?php echo $truck['CompanyName'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="action" value="delete_truck"/>
                                <input type="hidden" name="truck_id" value="<?php echo $truck['TruckID']; ?>"/>
                                <input style="margin: auto" type="submit" value="Delete"/>
                            </form>
                        </td>

                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</main>
