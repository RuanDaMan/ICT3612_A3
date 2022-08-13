<?php
$servername = "localhost";
$username = "id19414547_root";
$password = "R^JXo(n8UFUCYTNr";
$conn = new mysqli($servername, $username, $password);
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
                FROM id19414547_ict3612.LevyRecords lr
                LEFT JOIN id19414547_ict3612.Company c ON c.CompanyID = lr.CompanyID
                LEFT JOIN id19414547_ict3612.Trucks t ON t.TruckID = lr.TruckID
                LEFT JOIN id19414547_ict3612.LevyTerm lt ON lt.TermID = lr.LevyTypeID 
    ";
    return $GLOBALS['conn']->query($query);
}


function add_levy_record($company_id, $truck_id, $levy_term_id, $levy_amount)
{
    $query = "INSERT INTO id19414547_ict3612.LevyRecords (CompanyID, TruckID, LevyTypeID, LevyAmount, TransactionDate) VALUES ($company_id, $truck_id, $levy_term_id, $levy_amount, NOW())";
    return $GLOBALS['conn']->query($query);
}


?>