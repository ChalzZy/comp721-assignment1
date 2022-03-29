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

    require_once('conf/sqlinfo.inc.php');

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