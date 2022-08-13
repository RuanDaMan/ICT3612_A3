<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ass3task9", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$has_error = false;
$error_msg = "";

function get_levy_records()
{
    $query = "SELECT
                    lr.LevyRecordID, 
                    lr.CompanyID, 
                    c.CompanyName,
                    lr.TruckID,
                    t.TruckName,
                    lr.LevyTypeID,
                    lt.LevyType,
                    lr.LevyAmount, 
                    DATE_FORMAT(lr.TransactionDate, '%Y-%m-%d') AS TransactionDate
                FROM ass3task9.levyrecords lr
                LEFT JOIN ass3task9.company c ON c.CompanyID = lr.CompanyID
                LEFT JOIN ass3task9.trucks t ON t.TruckID = lr.TruckID
                LEFT JOIN ass3task9.levyterm lt ON lt.TermID = lr.LevyTypeID 
    ";
    return $GLOBALS['conn']->query($query);
}


function add_levy_record($company_id, $truck_id, $levy_term_id, $levy_amount)
{
    $query = "INSERT INTO ass3task9.levyrecords (CompanyID, TruckID, LevyTypeID, LevyAmount, TransactionDate) VALUES ($company_id, $truck_id, $levy_term_id, $levy_amount, NOW())";
    return $GLOBALS['conn']->query($query);
}


?>