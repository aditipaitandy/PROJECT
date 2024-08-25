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
        background-image: url('images/bgl.jpeg');
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
        <a href="voter_login.php" class="select">
            <img src="images/votelogo.JFIF" alt="Vote Cast Icon"> Login
        </a>
        <a href="voter_contact.php">
            <img src="images/contact.PNG" alt="Contact Icon"> Contact
        </a>
        <a href="front_admin_login.php">
            <img src="images/admin.PNG" alt="Admin Icon"> Admin
        </a>
    </div>


    <!-- Login Form Section -->
    <div class="back">
        <div class="head">
            <h4>Login</h4>
        </div>

        <form class="form" action="" method="post">
            <input placeholder="Epic Id" class="input" required type="text" name="epid">
            <br>

            <input placeholder="Unique Id" class="input" required type="text" name="uid">
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
    $epid = $_POST['epid'];
    $uid = $_POST['uid'];
    $pswd = $_POST['pswd'];

    $q = "SELECT * FROM voter_db WHERE epid='$epid' AND uid='$uid' AND pswd='$pswd'";
    $qry = mysqli_query($con, $q);
    $z = mysqli_fetch_assoc($qry);
    $atmpt = $z['atmpt'];
    $vote = $z['vote'];
    if ($qry->num_rows > 0) {
        if ($atmpt <= 0) {
            echo "<script>alert('NO MORE ATTEMPTS LEFT')</script>";
        } else if ($vote == 1) {
            echo "<script>alert('VOTE ALREADY CASTED')</script>";
        } else {
            $_SESSION['epid'] = $epid;
            $_SESSION['uid'] = $uid;
            header("Location: vote.php");
        }
    } else {
        echo "<script>alert('INCORRECT CREDENCIALS')</script>";
    }
}

?>