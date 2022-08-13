<html lang="en">

<body>
<style>
    .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    .column {
        float: left;
        width: 50%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
<?php include 'menu.inc'; ?>
<main>
    <h1>Task 5</h1>

    <div class="row">
        <div class="column">
            <h3>Table: <b>"generalLedgerAccounts"</b></h3>
            <p>The "generalLedgerAccounts" table represents contra accounts that will be used in the lines on the invoice to indicate what account this transaction will be allocated to .</p>
            <p>It will be stored on each invoice line and can be stored on a customer or supplier (like our vendor table) to act as a default option.</p>
            <p>The primary key for this table is "accountNo" and it contains no Foreign Keys</p>
        </div>
        <div class="column">
            <h3>Table: <b>"terms"</b></h3>
            <p>The "terms" table stores the available terms this system allows Customers to pay and Suppliers to be paid.</p>
            <p>It will be stored on each invoice and can be stored on a customer or supplier (like our vendor table) to act as a default option.</p>
            <p>The primary key for this table is "termsID" and it contains no Foreign Keys</p>
        </div>
        <div class="column">
            <h3>Table: <b>"vendors"</b></h3>
            <p>The "vendors" table represents the suppliers that can be used on the invoices.</p>
            <p>It contains all the necessary information which is important to either display on an invoice or to keep for other reasons. </p>
            <p> The primary key for this table is "vendorID" and it contains the following Foreign Keys:</p>
            <ul>
                <li>defaultTermsID: Primary Key on the "terms" table</li>
                <li>defaultAccountNo: Primary Key on the "generalLedgerAccounts" table</li>
            </ul>
            <p>Both foreign keys appear to act as the default option to use when creating an invoice with this supplier on it.</p>
        </div>
    </div>
    <div class="row">

        <div class="column">
            <h3>Table: <b>"invoices"</b></h3>
            <p>The "invoices" table represents the documents.</p>

            <p> The primary key for this table is "InvoiceID" and it contains the following Foreign Keys:</p>
            <ul>
                <li>vendorID: Primary Key on the "vendors" table</li>
                <li>termsID: Primary Key on the "terms" table</li>
            </ul>
        </div>

        <div class="column">
            <h3>Table: <b>"invoiceLineItems"</b></h3>
            <p>The "invoiceLineItems" table represents the lines that will live on the document.</p>

            <p> The primary keys for this table are "InvoiceID" and "InvoiceSequence" and it contains the following Foreign Keys:</p>
            <ul>
                <li>accountNo: Primary Key on the "generalLedgerAccounts" table</li>
            </ul>
        </div>
    </div>

    <iframe src="task5.txt" height="500" width="1500">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>