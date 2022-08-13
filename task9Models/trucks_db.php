<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ass3task9", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$has_error = false;
$error_msg = "";

function get_trucks()
{
    $query = "SELECT t.TruckID, t.TruckName, t.CompanyID, c.CompanyName FROM ass3task9.trucks t LEFT JOIN ass3task9.company c on c.CompanyID = t.CompanyID";
    return $GLOBALS['conn']->query($query);
}

function delete_truck($truck_id)
{
    $query = "DELETE FROM ass3task9.trucks WHERE TruckID = $truck_id";
    return $GLOBALS['conn']->query($query);
}

function add_truck($company_id, $truck_name)
{
    $query = "INSERT INTO ass3task9.trucks (CompanyID, TruckName) VALUES ($company_id,'$truck_name')";
    return $GLOBALS['conn']->query($query);
}


?>