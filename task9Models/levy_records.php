<?php
require('trucks_db.php');
require('company_db.php');
require('levy_db.php');
require('levy_records_db.php');

$levy_records = array();
$trucks = get_trucks();
$companies = get_companies();
$levies = get_levies();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_levy_records';
}

if ($action == 'list_levy_records') {
    $GLOBALS['levy_records'] = get_levy_records();
} elseif ($action == 'add_levy_record') {
    add_levy_record($_POST['company_id'], $_POST['truck_id'], $_POST['levy_term_id'], $_POST['levy_amount']);
    $GLOBALS['levy_records'] = get_levy_records();
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
        width: 75%;
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
            <h3>Levy Records</h3>
            <div>
                <form action="" method="post">
                    <input type="hidden" name="action" value="add_levy_record"/>

                    <label>Trucks:
                        <select name="truck_id">
                            <option value="">-----------------</option>
                            <?php foreach ($trucks as $truck) { ?>
                                <option value="<?php echo $truck['TruckID']; ?>"><?php echo $truck['TruckName']; ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <label>Companies:
                        <select name="company_id">
                            <option value="">-----------------</option>
                            <?php foreach ($companies as $company) { ?>
                                <option value="<?php echo $company['CompanyID']; ?>"><?php echo $company['CompanyName']; ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <label>Levy Type:
                        <select name="levy_term_id">
                            <option value="">-----------------</option>
                            <?php foreach ($levies as $levy) { ?>
                                <option value="<?php echo $levy['TermID']; ?>"><?php echo $levy['LevyType']; ?></option>
                            <?php } ?>
                        </select>
                    </label>
                    <label>Amount:
                        <input step=".01" type="number" name="levy_amount"/>
                    </label>
                    <input style="margin: auto" type="submit" value="Add"/>
                </form>
            </div>
            <table>
                <thead>
                <tr>
                    <th style="text-align: left">LevyRecordID</th>
                    <th style="text-align: left">TransactionDate</th>
                    <th style="text-align: left">CompanyID</th>
                    <th style="text-align: left">CompanyName</th>
                    <th style="text-align: left">TruckID</th>
                    <th style="text-align: left">TruckName</th>
                    <th style="text-align: left">LevyTypeID</th>
                    <th style="text-align: left">LevyType</th>
                    <th style="text-align: left">LevyAmount</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($levy_records as $levy_record) { ?>
                    <tr>
                        <td><?php echo $levy_record['LevyRecordID']; ?></td>
                        <td><?php echo $levy_record['TransactionDate']; ?></td>
                        <td><?php echo $levy_record['CompanyID']; ?></td>
                        <td><?php echo $levy_record['CompanyName']; ?></td>
                        <td><?php echo $levy_record['TruckID']; ?></td>
                        <td><?php echo $levy_record['TruckName']; ?></td>
                        <td><?php echo $levy_record['LevyTypeID']; ?></td>
                        <td><?php echo $levy_record['LevyType']; ?></td>
                        <td><?php echo $levy_record['LevyAmount']; ?></td>

                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</main>
