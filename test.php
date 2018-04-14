<?php

$MyDB = new mysqli("db", "root", "123", "example");

if ($MyDB->connect_errno) {
    die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

function sql($query) {
    global $MyDB;
    echo $query;
    $result = mysqli_query($MyDB, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  

    return $rows;
}

$id = 1;

$res = sql("SELECT isDog, sound FROM pets WHERE owner = {$id};")[0];
echo print_r($res, true);

echo "<hr/>";
echo print_r($_SERVER, true);