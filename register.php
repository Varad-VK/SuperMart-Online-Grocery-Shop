<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $phone = $address = $city =$username = $password = $confirm_password = "";
$birth_date = "";
$state = "";
$name_err = $phone_err = $address_err = $city_err = $username_err = $password_err = $confirm_password_err = "";
$birth_date_err = "";
$state_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter name!";
    } elseif (strlen(trim($_POST["name"])) < 8) {
        $name_err = "Name must have atleast 5 characters.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // Validate phone no.
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter phone no!";
    } elseif (!preg_match('/^[6-9][0-9]{9}$/', trim($_POST["phone"]))) {
        $phone_err = "phone no. can only contain numbers!";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE phone = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);

            // Set parameters
            $param_phone = trim($_POST["phone"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $phone_err = "Phone no. is already taken.";
                } else {
                    $phone = trim($_POST["phone"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate email (username is email)
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter email!";
    } elseif (!preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+.[A-Za-z]{2,4}$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This email is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have atleast 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate date
    if (empty(trim($_POST["birth_date"]))) {
        $birth_date_err = "Please enter DOB!";
    } 
    else {
        $birth_date = trim($_POST["birth_date"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter address";
    } elseif (strlen(trim($_POST["address"])) < 8) {
        $address_err = "Address must have atleast 8 characters.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Validate State
    if(isset($_POST['state'])) {
        //echo "selected State: ".htmlspecialchars($_POST['state']);
        $state = trim($_POST["state"]);
    }
    else
    {
        $state_err = "State must be selected.";
    }

    // Validate city
    if (empty(trim($_POST["city"]))) {
        $city_err = "Please enter city name";
    }  
    elseif (strlen(trim($_POST["city"])) < 2) {
        $city_err = "City name must have atleast 2 characters.";
    } 
    else {
        $city = trim($_POST["city"]);
    }
    // Check input errors before inserting in database
    if(empty($name_err) && empty($phone_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($birth_date_err) && empty($address_err) && empty($state_err) && empty($city_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (name, phone, username, password, birth_date, address, state, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$param_name ,$param_phone, $param_username, $param_password,$param_birth_date,$param_address,$param_state,$param_city);

            // Set parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_birth_date = $birth_date;
            $param_address = $address;
            $param_state = $state;
            $param_city = $city;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="./css/register.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Sign Up</title>
</head>

<body>
    <?php include"./components/header.php" ?>
    <div>
            <h3 style="margin-left:50px;" class="ml-3 text-3xl text-center">SuperMart</h3><br>

    </div>
    <div class="wrapper">
        <br><b><h1 class="ml-3 text-lg text-center">Sign Up</h1><br></b>
        <p class="ml-3 text-base text-center">Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Phone no.</label>
                <input type="number" placeholder="+91" minlength="10" maxlength="10" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Birth Date</label>
                <input type="date" name="birth_date" class="form-control <?php echo (!empty($birth_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birth_date; ?>">
                <span class="invalid-feedback"><?php echo $birth_date_err; ?></span>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="address" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                <span class="invalid-feedback"><?php echo $address_err; ?></span>
            </div>
            <div class="form-group">
                <label>State</label>
                <select name="state" class="form-control" >
                    <option value="-1">State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select> 
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="city" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                <span class="invalid-feedback"><?php echo $city_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-danger ml-2" value="Reset">
                <a href="index.php" style="margin-left:260px;" button class="btn btn-light">Skip Register</button></a>
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
    <?php include"./components/footer.php" ?>
</body>

</html>