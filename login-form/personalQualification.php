<?php

require_once "databaseConnection.php";
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;

$major = $_POST["major"];
$startDate = $_POST["start"];
$endDate = $_POST["end"];
$institution = $_POST["institution"];
$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$DOB = $_POST["dob"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$summary = $_POST['summary'];



if (isset($_POST['submit'])) {

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $sessionUser = $_SESSION['user'];

    $sql = "SELECT * FROM user_list WHERE username = '$sessionUser'";
    $result = mysqli_query($conn, $sql);

    $rowCount = mysqli_num_rows($result);

    if ($rowCount == 1) {
        while ($row = mysqli_fetch_assoc($result)) {

            $prof_sql = "UPDATE user_list SET profile = '$target_file' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET firstName = '$firstName' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET lastName = '$lastName' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET DOB = '$DOB' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET email = '$email' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET address = '$address' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET phone = '$phone' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $prof_sql = "UPDATE user_list SET summary = '$summary' WHERE username = '$sessionUser'";
            mysqli_query($conn, $prof_sql);

            $major_sql = "UPDATE user_list SET major = '$major' WHERE username = '$sessionUser'";
            mysqli_query($conn, $major_sql);

            $start_sql = "UPDATE user_list SET startDate = '$startDate' WHERE username = '$sessionUser'";
            mysqli_query($conn, $start_sql);

            $end_sql = "UPDATE user_list SET endDate = '$endDate' WHERE username = '$sessionUser'";
            mysqli_query($conn, $end_sql);

            $inst_sql = "UPDATE user_list SET institution = '$institution' WHERE username = '$sessionUser'";
            mysqli_query($conn, $inst_sql);

            header("Location: display.php?upload=success");
            exit();
        }
    }
}
