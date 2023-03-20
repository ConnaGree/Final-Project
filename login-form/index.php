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
    <link href="stylesheets/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <h1 class="greeting">Welcome to you personalized Extended Resume 🖐</h1>
    <div class="form-container">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <p class="account__question">Don't have account? <a href="register.php">Register here</a></p>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button class="submit" name="submit">LOGIN</button>
        </form>
        <a class="forgot-link" href="forgotPass.php">forgot password?</a>
    </div>
    <script src="js/input.js"></script>
</body>

</html>