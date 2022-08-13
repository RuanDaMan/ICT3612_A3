<?php
require('levy_db.php');

$levies = array();
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_levies';
}

if ($action == 'list_levies') {
    $GLOBALS['levies'] = get_levies();
} elseif ($action == 'delete_levy') {
    delete_levy($_POST['term_id']);
    $GLOBALS['levies'] = get_levies();
} elseif ($action == 'add_levy') {
    add_levy($_POST['levy_type']);
    $GLOBALS['levies'] = get_levies();
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
        width: 25%;
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
    <h2>Companies</h2>
    <div class="row">
        <div class="column">
            <h3>Levies</h3>
            <div>
                <form action="" method="post">
                    <input type="hidden" name="action" value="add_levy"/>
                    <label>Levy Type:
                        <input name="levy_type"/>
                    </label>
                    <input style="margin: auto" type="submit" value="Add"/>
                </form>
            </div>
            <table>
                <thead>
                <tr>
                    <th style="text-align: left">TermID</th>
                    <th style="text-align: left">LevyType</th>
                    <th style="text-align: left">Actions</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($levies as $levy) { ?>
                    <tr>
                        <td><?php echo $levy['TermID']; ?></td>
                        <td><?php echo $levy['LevyType'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="action" value="delete_levy"/>
                                <input type="hidden" name="term_id" value="<?php echo $levy['TermID']; ?>"/>
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
