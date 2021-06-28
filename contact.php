<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $message= "";
$email_err = $message_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email!";
  } elseif (!preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+.[A-Za-z]{2,4}$/', trim($_POST["email"]))) {
    $email_err = "email can only contain letters, numbers, and underscores.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validate name
  if (empty(trim($_POST["message"]))) {
    $message_err = "Please enter message!";
  } elseif (strlen(trim($_POST["message"])) < 8) {
    $message_err = "Message must have atleast 5 characters.";
  } else {
    $message = trim($_POST["message"]);
  }


  // Check input errors before inserting in database
  if (empty($email_err) && empty($address_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO message (email, message) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_message);

      // Set parameters
      $param_email = $email;
      $param_message = $message;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        echo " <h2 class='text-gray-900 text-lg mb-1 font-medium title-font'style='text-align:center;'>Message Sent Sucessfully!</h2>";
      } else {
        echo "Oops! Something went wrong. Please try again later.";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Contact Us | SuperMart</title>
  <link rel="icon" href="./images/grocery.png" type="image/x-icon">
</head>

<body>
  <?php include("./components/header.php"); ?>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <section class="text-gray-700 body-font relative">
      <div class="absolute inset-0 bg-gray-300">
        <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://ongoingoperations.com/wp-content/uploads/2013/04/ogo-tech-support.jpg" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
      </div>
      <div class="container px-5 py-24 mx-auto flex">
        <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10">
          <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
          <p class="leading-relaxed mb-5 text-gray-600">We are always listening! Feel free to contact</p>


          <input class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="email" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
          <span class="invalid-feedback"><?php echo $email_err; ?></span>
          <textarea minlength="5" class="bg-white rounded border border-gray-400 focus:outline-none h-32 focus:border-indigo-500 text-base px-4 py-2 mb-4 resize-none" placeholder="Message" type="text" name="message" <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>"></textarea>
          <span class="invalid-feedback"><?php echo $message_err; ?></span>
          <button class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg" type="submit" value="submit">Submit</button>
  </form>
  <p class="text-xs text-gray-500 mt-3">We will contact u within 10-6PM in 2 business days </p>
  </div>
  </section>
  <?php include "./components/footer.php" ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>