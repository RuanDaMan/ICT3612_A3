<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ass3task9", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$has_error = false;
$error_msg = "";

function get_companies()
{
    $query = "SELECT * FROM ass3task9.company";
    return $GLOBALS['conn']->query($query);
}

function delete_company($company_id)
{
    $query = "DELETE FROM ass3task9.company WHERE CompanyID = $company_id";
    return $GLOBALS['conn']->query($query);
}
function add_company($company_name)
{
    $query = "INSERT INTO ass3task9.company (CompanyName) VALUES ('$company_name')";
    return $GLOBALS['conn']->query($query);
}


?>