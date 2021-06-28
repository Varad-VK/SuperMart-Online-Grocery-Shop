<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $rating = $recommend = $suggestion = "";
$email_err = $rating_err = $recommend_err = $suggestion_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate email (username is email)
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email!";
  } elseif (!preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+.[A-Za-z]{2,4}$/', trim($_POST["email"]))) {
    $email_err = "email can only contain letters, numbers, and underscores.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validate Rating
  if (isset($_POST['rating'])) {
    $rating = trim($_POST["rating"]);
  } else {
    $rating_err = "Rating must be selected.";
  }

  // Validate Recommendation
  if (isset($_POST['recommend'])) {
    $recommend = trim($_POST["recommend"]);
  } else {
    $recommend_err = "Select Recommendation";
  }

  // Validate Suggestion
  if (empty(trim($_POST["suggestion"]))) {
    $suggestion_err = "Please enter suggestion!";
  } elseif (strlen(trim($_POST["suggestion"])) < 2) {
    $suggestion_err = "Suggestion must have atleast 2 characters.";
  } else {
    $suggestion = trim($_POST["suggestion"]);
  }


  // Check input errors before inserting in database
  if (empty($email_err) && empty($rating_err) && empty($recommend_err) && empty($suggestion_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO feedback (email, service_rating, recommend, suggestion) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_rating, $param_recommend, $param_suggestion);

      // Set parameters
      $param_email = $email;
      $param_rating = $rating;
      $param_recommend = $recommend;
      $param_suggestion = $suggestion;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        echo " <h2 class='text-gray-900 text-lg mb-1 font-medium title-font'style='text-align:center;'>Feedback Sent Sucessfully!</h2>";
      } else {
        echo "Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="icon" href="./images/grocery.png" type="image/x-icon">
  <style>
    body {
      align-items: center;
      align-self: center;
      align-content: center;
    }

    .form-group {
      margin: 5px;
      margin-left: 100px;
    }
  </style>
  <title>Feedback | SuperMart</title>
</head>

<body>
    <?php include "./components/header.php" ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control col-md-6" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
      <span class="invalid-feedback"><?php echo $email_err; ?></span>
    </div>
    <div class="form-group">
      <label>Rate our Service (1-10):</label>
      <select name="rating" class="form-control col-md-6">
        <option value="-1">Select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
    <div class="form-group">
      <label>Will you recommend our service to your friends/ family (1-10):</label>
      <select name="recommend" class="form-control col-md-6">
        <option value="-1">Select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
    <div class="form-group">
      <label>Suggestion</label>
      <input type="textarea" name="suggestion" class="form-control col-md-6" <?php echo (!empty($suggestion_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $suggestion; ?>">
      <span class="invalid-feedback"><?php echo $suggestion_err; ?></span>
    </div>

    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit">
      <input type="reset" class="btn btn-info ml-2" value="Reset">
    </div>
  </form>
  </div>
  <?php include "./components/footer.php" ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>