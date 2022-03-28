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
      <form class="container">
        <div class="mb-3">
          <label for="statusCodeField" class="form-label">Status Code (Required)</label>
          <input type="text" class="form-control" id="statusCodeField" placeholder="">
        </div>
        <div class="mb-3">
          <label for="statusField" class="form-label">Status (Required)</label>
          <input type="text" class="form-control" id="statusField" placeholder="">
        </div>
        <p>Share:</p>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <label class="form-check-label" for="inlineRadio1">Public</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">Friends</label>
        </div>
        <div class="form-check form-check-inline mb-3">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
          <label class="form-check-label" for="inlineRadio3">Only Me</label>
        </div>
        <p>Date:</p>
        <div class="input-group date mb-3" data-provide="datepicker">
          <input type="date" class="form-control">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
        <p>Permission Type:</p>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
          <label class="form-check-label" for="inlineCheckbox1">Allow Like</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
          <label class="form-check-label" for="inlineCheckbox2">Allow Comment</label>
        </div>
        <div class="form-check form-check-inline mb-3">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
          <label class="form-check-label" for="inlineCheckbox3">Allow Share</label>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary">Post</button>
          <button type="submit" class="btn btn-secondary">Reset</button>     
        </div>
      </form>
      <a href="/index.html">Return to Home Page</a>
    </div>
  </body>
</html>
