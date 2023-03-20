<!-- Admin will have the access to know how many user -->
<!-- Admin will have the access to logs -->
<!-- Admin will have the authorization to disable/delete user -->
<?php
require_once "databaseConnection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/admin.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="dash-container">
        <div class="left-dash">
            <h2 class="dash-text">Dashboard</h2>
            <form action="dashCenter.php" method="post">
                <button class="numCheck" type="submit" name="users_num">Users (<?php
                                                                                $sql = "SELECT COUNT(id) FROM user_list";
                                                                                $result = mysqli_query($conn, $sql);
                                                                                $row = mysqli_fetch_assoc($result);

                                                                                echo $row['COUNT(id)'];
                                                                                ?>)</button>
                <button class="logs" name="logs" type="submit">Logs</button>
                <button class="userControl" type="submit">User Control</button>
            </form>
        </div>
        <div class="right-dash">
            <h1 class="user">Users</h1>
            <div class="user_list">
                <?php
                $sql = "SELECT * FROM user_list LIMIT 1";
                $result = mysqli_query($conn, $sql);

                $rowCount = mysqli_num_rows($result);

                $row = mysqli_fetch_assoc($result);
                ?>
                <p class="id"><?php echo $row['id'] ?></p>
                <p class="username"><?php echo $row['username'] ?></p>
                <p class="password"><?php echo $row['password'] ?></p>
            </div>

        </div>
    </div>
    <?php
    // class Employee
    // {
    //     protected $name;
    //     protected $wage;

    //     function __construct()
    //     {
    //         echo "Employee construct is called</br>";
    //     }
    // }
    // class Manager extends Employee
    // {
    //     function __construct()
    //     {
    //         parent::__construct();
    //         echo "Manager construct is called!";
    //     }
    // }

    // $manager = new Manager();

    trait Log
    {
        function writeLog($message)
        {
            file_put_contents("users.txt", $message . "\n", FILE_APPEND);
        }
    }

    class A
    {
        function __construct()
        {
            $this->WriteLog("Constructor A called");
        }
        use Log;
    }
    class B
    {
        function __construct()
        {
            $this->WriteLog("Constructor B called");
        }
        use Log;
    }
    ?>
</body>

</html>
<!-- 
    
 -->