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
      <h1 class="text-center">Status Information</h1>
      <form
        class="container text-center"
        action="/assignment1/searchstatusprocess.php"
        method="get"
      >
        <?php 
            $goBack = "<a href=\"../assignment1/poststatusform.php\" type=\"button\" class=\"btn btn-primary\">Go back</a>";
            $search = "";

            if (empty($_GET["search"])) {
                echo "The search string is empty. Please enter a keyword to search.<br />";
                echo $goBack;
                exit();
            };

            $search = $_GET["search"];

            echo $search . "<br />";

            require_once('conf/sqlinfo.inc.php');

            $conn = mysqli_connect($sql_host,
            $sql_user,
            $sql_pass,
            $sql_db
            );

            $query = "SELECT * FROM `poststatustable` WHERE currentstatus LIKE '%fox%'";
            $queryResult = mysqli_query($conn, $query);

            if ($queryResult->num_rows > 0) {
                // output data of each row
                while($row = $queryResult->fetch_assoc()) {
                  echo $row["currentstatus"] . ", " . $row["statuscode"] . ", " . $row["radio"] . ", " . $row["datechosen"] . ", " . $row["checkbox"] . "<br />";
                }
              } else {
                echo "0 results";
              }

            // echo $queryResult;
        ?>
      <p><br /><a href="/assignment1/index.html">Return to Home Page</a></p>
    </div>
  </body>
</html>


