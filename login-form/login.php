<?php
ob_start();
require_once "databaseConnection.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: index.php?error=empty fields");
        exit();
    } else if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
        header("Location: index.php?error=invalid username");
        exit();
    } else {
        $sql = "SELECT * FROM user_list WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        $rowCount = mysqli_num_rows($result);

        if ($rowCount == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);

                if ($passCheck === true) {
                    session_start();
                    $_SESSION['user'] = $username;
                    $_SESSION['id'] = $row['id'];

                    foreach ($row as $key => $value) {
                        if ($row[$key] != NULL) {
                            header("Location: display.php");
                        } else {
                            header("Location: Session.php?success=welcome");
                        }
                    }




                    exit();
                } else if ($passCheck === false) {
                    header("Location: index.php?error=wrong password");
                    exit();
                } else {
                    header("Location: index.php?error=invalid credential");
                    exit();
                }
            }
        } else {
            header("Location: index.php?error=invalid credential");
            exit();
        }
    }
    mysqli_close($conn);
}
