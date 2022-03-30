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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
      <a class="navbar-brand ps-3" href="/">Diary - Social Media Network</a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/assignment1/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/assignment1/searchstatusform.html"
            >Search Status</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/assignment1/poststatusform.php"
            >Post Status</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/assignment1/about.html">About</a>
        </li>
      </ul>
    </nav>
    <div class="container text-center">
      <h1 class="text-center">Status Information</h1>
        <?php 
            $goBack = "<a href=\"../assignment1/searchstatusform.html\" type=\"button\" class=\"btn btn-primary\">Go back</a>";
            $search = "";

            if (empty($_GET["search"])) {
                echo "  <div class=\"alert alert-danger\" role=\"alert\">
                            The search string is empty. Please enter a keyword to search.
                        </div>";
                echo $goBack;
                exit();
            };

            $search = $_GET["search"];

            require_once('conf/sqlinfo.inc.php');

            $conn = mysqli_connect($sql_host,
            $sql_user,
            $sql_pass,
            $sql_db
            );
            
            $exists = false;
            try {
                $tableExists = mysqli_query($conn, "SELECT * FROM `poststatustable` WHERE 1");
                $exists = true;
            } catch (Exception $e) {
                $exists = false;
            }

            if ($exists) {
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">The MySQL table does not exist. Please create it first.</div>";
                echo $goBack;
            }

            if ($exists) {
                $query = "SELECT * FROM `poststatustable` WHERE currentstatus LIKE '%".$search."%'";
                $queryResult = mysqli_query($conn, $query);
                
                if ($queryResult->num_rows > 0) {
                    // output data of each row
                    echo "<table class=\"table\">";
                    echo "  <thead>
                                <tr>
                                    <th scope=\"col\">Status</th>
                                    <th scope=\"col\">Status Code</th>
                                    <th scope=\"col\">Share</th>
                                    <th scope=\"col\">Date Posted</th>
                                    <th scope=\"col\">Permission</th>
                                </tr>
                            </thead>
                            <tbody>";
                    //creation of table
                    while($row = $queryResult->fetch_assoc()) {
                        echo "<tr>";
                            echo "<th scope=\"row\">". $row["currentstatus"] ."</th>";
                            echo "<th>". $row["statuscode"] . "</th>";
                            echo "<th>". $row["radio"] . "</th>";
                            echo "<th>". $row["datechosen"] . "</th>";
                            echo "<th>". $row["checkbox"] . "</th>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<a href=\"../assignment1/searchstatusform.html\" type=\"button\" class=\"btn btn-primary me-3\">Search for another status</a>";
                    echo "<a href=\"../assignment1/index.html\" type=\"button\" class=\"btn btn-primary\">Go home</a>";
                } else {    
                    echo "  <div class=\"alert alert-warning\" role=\"alert\">
                                 '".$search."' status not found. Please try a different keyword.
                            </div>";
                    echo $goBack;
                }
            }

        ?>
      <p><br /><a href="/assignment1/index.html">Return to Home Page</a></p>
    </div>
    <footer class="bg-dark text-center text-lg-start mt-5">
      <div class="text-center p-3 text-light">
        Charles Monaghan | Student ID: 18012390 | COMP721 2022 Assignment 1
      </div>
    </footer>
  </body>
</html>


