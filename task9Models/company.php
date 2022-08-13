<?php
require('company_db.php');

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
} elseif ($action == 'delete_company') {
    delete_company($_POST['company_id']);
    $GLOBALS['companies'] = get_companies();
} elseif ($action == 'add_company') {
    add_company($_POST['company_name']);
    $GLOBALS['companies'] = get_companies();
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
            <h3>Companies</h3>
            <div>
                <form action="" method="post">
                    <input type="hidden" name="action" value="add_company"/>
                    <label>Company Name:
                        <input name="company_name"/>
                    </label>
                    <input style="margin: auto" type="submit" value="Add"/>
                </form>
            </div>
            <table>
                <thead>
                <tr>
                    <th style="text-align: left">CompanyID</th>
                    <th style="text-align: left">CompanyName</th>
                    <th style="text-align: left">Actions</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($companies as $company) { ?>
                    <tr>
                        <td><?php echo $company['CompanyID']; ?></td>
                        <td><?php echo $company['CompanyName'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="action" value="delete_company"/>
                                <input type="hidden" name="company_id" value="<?php echo $company['CompanyID']; ?>"/>
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
