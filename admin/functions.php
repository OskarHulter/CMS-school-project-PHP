<?php
function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("Query failed:" . mysqli_error($connection));
    }
}

function username_exists($username)
{
    global $connection;

    $query = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    //Använder en funktion som räknar hur många resultat som returneras, detta kontrollerar om det finns duplicerade fält.
    if (mysqli_num_rows($result) > 0) {
         return true;
    } else {
        return false;
    }
}
