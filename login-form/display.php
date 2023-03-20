<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['user'] . $_SESSION['id']; ?></title>
    <link rel="stylesheet" href="stylesheets/shown.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <?php

    function returnData($item)
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "contacts_list";


        $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

        if (!$conn) {
            die("Failed to Connect to the Database!");
        }


        $sessionUser =  $_SESSION['user'];
        $sql = "SELECT * FROM user_list WHERE username = '$sessionUser'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                return $row[$item];
            }
        }
    }
    ?>

    <div class="main__container">
        <div class="left__container">
            <div class="profile__container">
                <img class="profile__pic" src="<?php
                                                echo returnData('profile');
                                                ?>" alt="">
            </div>

            <div class="contact__container">
                <h2 class="education__title">Contact</h2>
                <p class="email">Email
                    <span> <?php
                            echo returnData('email') ?></span>
                </p>
                <p class="address">
                    Address
                    <span><?php
                            echo returnData('address') ?></span>
                </p>
                <p class="phone">
                    Phone
                    <span><?php
                            echo returnData('phone') ?></span>
                </p>

            </div>

            <div class="education__container">
                <h2 class="education__title">Education</h2>
                <p class="major">
                    <?php
                    echo returnData('major') ?>
                </p>
                <p class="institution">
                    <?php
                    echo returnData('institution') ?>
                </p>

                <div class="date__container">
                    <span class="startDate">
                        <?php
                        echo returnData('startDate') ?>
                    </span>

                    <i class="uil uil-line-alt"></i>

                    <span class="endDate">
                        <?php
                        echo returnData('endDate') ?>
                    </span>
                </div>

            </div>
            <div class="qr__container"></div>
        </div>

        <div class="right__container">
            <h1 class="user__name"><?php
                                    echo returnData('firstName');
                                    ?> <?php
                                        echo returnData('lastName');
                                        ?></h1>

            <p class="summary"><?php
                                echo returnData('summary');
                                ?></p>
        </div>
    </div>

</body>