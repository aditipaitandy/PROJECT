<?php
include("db.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Online Voting System</title>
    <link rel="stylesheet" href="voter.css" />
    <link rel="stylesheet" href="first_style.css" />
    <style>
        body {
            background-image: url('images/bga.jpeg');
            background-size: cover;
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="images/logo3.png" alt="Logo">
        <h1>Online Voting System</h1>
    </div>

    <!-- Navigation bar -->
    <div class="nav">
        <a href="front_page.php">
            <img src="images/home.PNG" alt="Home Icon"> Home
        </a>
        <a href="front_page_about.php">
            <img src="images/about.PNG" alt="About Icon"> About
        </a>
        <a href="voter_register.php">
            <img src="images/register.JFIF" alt="Register Icon"> Register
        </a>
        <a href="login_instruction.php">
            <img src="images/votelogo.JFIF" alt="Vote Cast Icon"> Login
        </a>
        <a href="voter_contact.php">
            <img src="images/contact.PNG" alt="Contact Icon"> Contact
        </a>
        <a href="front_admin_login.php" class="select">
            <img src="images/admin.PNG" alt="Admin Icon"> Admin
        </a>
    </div>


    <!-- Login Form Section -->
    <div class="back">
        <div class="head">
            <h4>Admin Login</h4>
        </div>

        <form class="form" action="" method="post">
            <input placeholder="Id" class="input" required type="text" name="id">
            <br>
            <input placeholder="Password" class="input" required type="password" name="pswd">
            <br>
            <br>

            <button type="submit" name="submit">Login</button>
        </form>
    </div>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $pswd = $_POST['pswd'];

    $q = "SELECT * FROM admin_db WHERE id='$id' AND pswd='$pswd'";
    $qry = mysqli_query($con, $q);
    $z = mysqli_fetch_assoc($qry);
    if ($qry->num_rows > 0) {
        $_SESSION['adid'] = $id;
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('INCORRECT CREDENCIALS')</script>";
    }
}

?>