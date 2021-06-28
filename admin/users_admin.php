<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="../images/grocery.png" type="image/x-icon">
    <title> Users | SuperMart Admin</title>
</head>

<body>
    <?php include "admin_header.php"; ?>

    <h3 style="text-align:center;">Users Details</h3>

    <table class="table table-striped table-condensed">
        <tr>
            <td>No.</td>
            <td>Name</td>
            <td>Email</td>
            <td>Birth Date</td>
            <td>Phone</td>
            <td>Address</td>
            <td>State</td>
            <td>City</td>
            <td>Account Created on</td>
        </tr>

        <?php

        include "../config.php"; // Using database connection file here

        $records = mysqli_query($con, "select * from users"); // fetch data from database

        while ($data = mysqli_fetch_array($records)) {
        ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['birth_date']; ?></td>
                <td><?php echo $data['phone']; ?></td>
                <td><?php echo $data['address']; ?></td>
                <td><?php echo $data['state']; ?></td>
                <td><?php echo $data['city']; ?></td>
                <td><?php echo $data['created_at']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <?php mysqli_close($con); // Close connection 
    ?>


    <?php include "admin_footer.php" ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>