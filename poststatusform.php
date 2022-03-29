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
      <form class="container" action="/assignment1/poststatusprocess.php" method="post">
        <div class="mb-3">
          <label for="statusCodeField" class="form-label">Status Code (Required)</label>
          <input type="text" name="statuscode" class="form-control" id="statusCodeField" required>
        </div>
        <div class="mb-3">
          <label for="statusField" class="form-label">Status (Required)</label>
          <input type="text" name="status" class="form-control" id="statusField" required>
        </div>
        <p>Share:</p>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="Public">
          <label class="form-check-label" for="inlineRadio1">Public</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="Friends">
          <label class="form-check-label" for="inlineRadio2">Friends</label>
        </div>
        <div class="form-check form-check-inline mb-3">
          <input class="form-check-input" type="radio" name="radio" id="inlineRadio3" value="Only Me">
          <label class="form-check-label" for="inlineRadio3">Only Me</label>
        </div>
        <p>Date:</p>
        <div class="input-group date mb-3" data-provide="datepicker">
          <?php
          echo '
          <input type="date" name="date" class="form-control" value="'.date('Y-m-d').'" required>
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
          '
          ?>
        </div>
        <p>Permission Type:</p>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="checkbox[]" id="inlineCheckbox1" value="Allow Like">
          <label class="form-check-label" for="inlineCheckbox1">Allow Like</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="checkbox[]" id="inlineCheckbox2" value="Allow Comment">
          <label class="form-check-label" for="inlineCheckbox2">Allow Comment</label>
        </div>
        <div class="form-check form-check-inline mb-3">
          <input class="form-check-input" type="checkbox" name="checkbox[]" id="inlineCheckbox3" value="Allow Share">
          <label class="form-check-label" for="inlineCheckbox3">Allow Share</label>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary">Post</button>
          <button type="link" class="btn btn-secondary">Reset</button>     
        </div>
      </form>
      <a href="/assignment1/index.html">Return to Home Page</a>
    </div>
  </body>
</html>