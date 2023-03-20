<?php
require_once "databaseConnection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-form</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form-container">
        <form action="checkNewPass.php" method="post">
            <h1>Reset Password</h1>
            <p>enter new password please!</p>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <input type="password" name="newPassword" placeholder="new password">
            <input type="password" name="confirmPassword" placeholder="confirm password">
            <button class="submit" name="submit">RESET</button>
        </form>
    </div>
    <script src="js/input.js"></script>
</body>

</html>