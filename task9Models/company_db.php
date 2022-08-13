<?php
$servername = "localhost";
$username = "id19414547_root";
$password = "R^JXo(n8UFUCYTNr";
$conn = new mysqli($servername, $username, $password);

$has_error = false;
$error_msg = "";

function get_companies()
{
    $query = "SELECT * FROM id19414547_ict3612.Company";
    return $GLOBALS['conn']->query($query);
}

function delete_company($company_id)
{
    $query = "DELETE FROM id19414547_ict3612.Company WHERE CompanyID = $company_id";
    return $GLOBALS['conn']->query($query);
}
function add_company($company_name)
{
    $query = "INSERT INTO id19414547_ict3612.Company (CompanyName) VALUES ('$company_name')";
    return $GLOBALS['conn']->query($query);
}


?>