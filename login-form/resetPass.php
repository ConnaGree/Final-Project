<?php
require_once "databaseCon.php";
require_once "Mail Library/src/PHPMailer.php";
session_start();


if (isset($_POST['submit'])) {

    $username = $_POST['username'];

    if (empty($username)) {
        header("Location: forgotPass.php?error=empty field");
        exit();
    } else if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
        header("Location: forgotPass.php?error=invalid username");
        exit();
    } else {

        $sql = "SELECT * FROM user_list WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount === 1) {
            $_SESSION['user'] = $username;
            header("Location: newPass.php?resetPassword");
            exit();
        } else {
            header("Location: forgotPass.php?error=invalid user");
        }
    }
}
