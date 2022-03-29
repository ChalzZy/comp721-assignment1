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
		echo "<p>Database connection failure</p>";
	} else {
		echo "<p>Database connection success</p>";
	}

    // only creates table if it doesn't already exist
    $sql = "CREATE TABLE IF NOT EXISTS PostStatusTable (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        statuscode VARCHAR(30) NOT NULL,
        currentstatus VARCHAR(30) NOT NULL,
        radio VARCHAR(50),
        datechosen VARCHAR(10),
        checkbox VARCHAR(30)
        )";

    $retrieveStatusCode = "SELECT statuscode FROM `poststatustable` 
        where statuscode like '" . $statusCode . "'";

    // create table
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        exit("Error creating table:");
    }

    $noStatusCodeDuplicate = false;
    // check formating of status code
    if (strlen($statusCode) != 5 || substr($statusCode, 0, 1) != 'S') {
        echo "<br />Wrong format! The status code must start with an “S” followed by four digits, like \"S0001\"";
    } else {
        // check if the statusCode already exists
        $result = mysqli_query($conn, $retrieveStatusCode);
        if (mysqli_num_rows($result) > 0) {
            exit ("The status code already exists. Please try another one!");
            $noStatusCodeDuplicate = true;
        } else {
            echo "<br />No duplicate status codes found!";
        }
    }

    // check formatting of status
    echo "<br />test";
?>