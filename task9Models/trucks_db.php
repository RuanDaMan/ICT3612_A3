<?php
$servername = "localhost";
$username = "id19414547_root";
$password = "R^JXo(n8UFUCYTNr";
$conn = new mysqli($servername, $username, $password);
$has_error = false;
$error_msg = "";

function get_trucks()
{
    $query = "SELECT t.TruckID, t.TruckName, t.CompanyID, c.CompanyName FROM id19414547_ict3612.Trucks t LEFT JOIN id19414547_ict3612.Company c on c.CompanyID = t.CompanyID";
    return $GLOBALS['conn']->query($query);
}

function delete_truck($truck_id)
{
    $query = "DELETE FROM id19414547_ict3612.Trucks WHERE TruckID = $truck_id";
    return $GLOBALS['conn']->query($query);
}

function add_truck($company_id, $truck_name)
{
    $query = "INSERT INTO id19414547_ict3612.Trucks (CompanyID, TruckName) VALUES ($company_id,'$truck_name')";
    return $GLOBALS['conn']->query($query);
}


?>