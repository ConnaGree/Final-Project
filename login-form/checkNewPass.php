<?php
session_start();
require_once "databaseConnection.php";

if (isset($_SESSION['user'])) {
    echo "Good to go!";
} else {
    echo "check your session";
}

if (isset($_POST['submit'])) {

    $newPass = $_POST['newPassword'];
    $confirmPass = $_POST['confirmPassword'];

    if (empty($newPass) || empty($confirmPass)) {
        header("Location: newPass.php?error=empty fields");
        exit();
    } else if ($confirmPass != $newPass) {
        header("Location: newPass.php?error=password doesn't match");
        exit();
    } else {

        $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
        $sessionUser = $_SESSION['user'];
        // $sql = "UPDATE user_list SET password = {$hashedPass} WHERE username =  {$_SESSION['user']}";
        $sql = "UPDATE user_list SET password = '$hashedPass' WHERE username = '$sessionUser'";
        mysqli_query($conn, $sql);

        header("Location: index.php?success=password reset");
        exit();
    }
}
