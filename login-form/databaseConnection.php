<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "contacts_list";


$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Failed to Connect to the Database!");
}
