<?php

$to = "zerubabelyon@gmail.com";
    $subject = "this is a test";
    $message = "Test from PHP script";
    $header = "From:19btris069@jainuniversity.ac.in";

    $time = time();

    mail($to, $subject, $message, $header);
    print "Script Ran '$time'";

    
?>