<?php
session_start();
require_once "databaseConnection.php";

session_unset();
session_destroy();


header("Location: index.php");
