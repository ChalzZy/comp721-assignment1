<?php 
    $statusCode = $_POST["statuscode"];
    $status = $_POST["status"];
    $radio = $_POST["radio"];
    $date = $_POST["date"];
    $checkbox = $_POST["checkbox"];

    echo $statusCode . "<br />";
    echo $status . "<br />"; 
    echo $radio . "<br />"; 
    echo $date . "<br /><br />";
    foreach($checkbox as $item) {
        echo $item . "<br />";
    }
?>