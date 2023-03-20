<?php
require_once "databaseConnection.php";

if (isset($_POST['submit'])) {


    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($username) || empty($password) || empty($confirmPassword)) {
        header("Location: register.php?error=empty field");
        exit();
    } else if ($confirmPassword != $password) {
        header("Location: register.php?error=password doesn't match");
        exit();
    } else if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
        header("Location: register.php?error=invalid username");
        exit();
    } else {
        $sql = "SELECT * FROM user_list WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            header("Location: register.php?error=username taken");
            exit();
        } else {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user_list (username, password) VALUES ('$username', '$hashedPass')";

            $result = mysqli_query($conn, $sql);

            header("Location: index.php?success=registration successful");
            exit();
        }
    }
}
