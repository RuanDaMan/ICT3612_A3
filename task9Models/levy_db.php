<?php
$servername = "localhost";
$username = "id19414547_root";
$password = "R^JXo(n8UFUCYTNr";
$conn = new mysqli($servername, $username, $password);
$has_error = false;
$error_msg = "";

function get_levies()
{
    $query = "SELECT * FROM id19414547_ict3612.LevyTerm";
    return $GLOBALS['conn']->query($query);
}

function delete_levy($term_id)
{
    $query = "DELETE FROM id19414547_ict3612.LevyTerm WHERE TermID = $term_id";
    return $GLOBALS['conn']->query($query);
}
function add_levy($levy_type)
{
    $query = "INSERT INTO id19414547_ict3612.LevyTerm (LevyType) VALUES ('$levy_type')";
    return $GLOBALS['conn']->query($query);
}


?>