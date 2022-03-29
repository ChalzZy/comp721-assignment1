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

    // include('../conf/sqlinfo.inc.php');

    $sql_host="localhost";
	$sql_user="root";
	$sql_pass="";
	$sql_db="yrw9551";

    $conn = mysqli_connect($sql_host,
	$sql_user,
	$sql_pass,
	$sql_db
	);

	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else {
		echo "<p>Database connection success</p>";
	}
?>