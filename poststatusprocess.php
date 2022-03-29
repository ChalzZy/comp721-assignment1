<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Status Posting System</title>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Status Posting System</h1>
      <form
        class="container text-center"
        action="/assignment1/searchstatusprocess.php"
        method="get"
      >
        <?php 
            $goBack = "<button type=\"button\" class=\"btn btn-primary\">Go back</button>";

            $statusCode = $_POST["statuscode"];
            $status = $_POST["status"];
            $radio = $_POST["radio"];
            $date = $_POST["date"];
            $checkbox = $_POST["checkbox"];
            $checkboxConcat = "";

            // echo $statusCode . "<br />";
            // echo $status . "<br />"; 
            // echo $radio . "<br />"; 
            // echo $date . "<br /><br />";

            // convert 'Permission Type' section from an array to string
            $isFirst = true;
            foreach($checkbox as $item) {
                if ($isFirst) { 
                    $isFirst = false;
                    $checkboxConcat .= $item;
                    continue;
                }
                $checkboxConcat .= ", " . $item;
            }

            // echo $checkboxConcat;

            require_once('conf/sqlinfo.inc.php');

            $conn = mysqli_connect($sql_host,
            $sql_user,
            $sql_pass,
            $sql_db
            );

            // if (!$conn) {
            //     echo "<p>Database connection failure</p>";
            // } else {
            //     echo "<p>Database connection success</p>";
            // }

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
            } else {
                echo "Error creating table:";
            }

            $correctFormat = true;
            $noStatusCodeDuplicate = false;
            // check formating of status code
            if (strlen($statusCode) != 5 || substr($statusCode, 0, 1) != 'S') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong format! The status code must start with an “S” followed by four digits, like \"S0001\"</div>";
                echo $goBack;
                // echo ("<br />Wrong format! The status code must start with an “S” followed by four digits, like \"S0001\"");
                $correctFormat = false;
            } else {
                // check if the statusCode already exists
                $result = mysqli_query($conn, $retrieveStatusCode);
                if (mysqli_num_rows($result) > 0) {
                    exit ("The status code already exists. Please try another one!");
                } else {
                    // echo "<br />No duplicate status codes found!";
                    $noStatusCodeDuplicate = true;
                }
            }

            // check regex pattern
            $passedRegex = false;
            $pattern = "/[0-9A-Za-z.,?! ]+$/";
            if ($correctFormat && $noStatusCodeDuplicate) {
                if (preg_match($pattern, $status)) {
                    // echo '<br />matches';
                    $passedRegex = true;
                } else {
                    echo '<br />doesnt match';
                }
            }

            // // insert data into table
            // if ($passedRegex) {
            //     $insertData = "INSERT INTO `poststatustable`(`statuscode`, `currentstatus`, `radio`, `datechosen`, `checkbox`) VALUES ('".$statusCode."','".$status."','".$radio."','".$date."','".$checkboxConcat."')";
                
            //     if ($conn->query($insertData) === true) {
            //         echo "New record created successfully";
            //     } else {
            //         echo "Error: " . $sql . "<br>" . $conn->error;
            //     }
            // }
        ?>
      <p><br /><a href="/assignment1/index.html">Return to Home Page</a></p>
    </div>
  </body>
</html>


