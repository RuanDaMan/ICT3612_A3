<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ass3task9", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$has_error = false;
$error_msg = "";

function get_levies()
{
    $query = "SELECT * FROM ass3task9.levyterm";
    return $GLOBALS['conn']->query($query);
}

function delete_levy($term_id)
{
    $query = "DELETE FROM ass3task9.levyterm WHERE TermID = $term_id";
    return $GLOBALS['conn']->query($query);
}
function add_levy($levy_type)
{
    $query = "INSERT INTO ass3task9.levyterm (LevyType) VALUES ('$levy_type')";
    return $GLOBALS['conn']->query($query);
}


?>