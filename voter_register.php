<?php
session_start();
include("db.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="voter.css" />
    <link rel="stylesheet" href="first_style.css" />
    <style>
    body {
        background-image: url('images/bgr.jpeg');
        background-size: cover;
        background-position: center;
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
    }
    </style>
</head>

<body>

    <div class="header">
        <img src="images/logo3.png">
        <h1>Online Voting System </h1>

    </div>


    <!-- Navigation bar -->
    <div class="nav">
        <a href="front_page.php">
            <img src="images/home.PNG" alt="Home Icon"> Home
        </a>
        <a href="front_page_about.php">
            <img src="images/about.PNG" alt="About Icon"> About
        </a>
        <a href="voter_register.php" class="select">
            <img src="images/register.JFIF" alt="Register Icon"> Register
        </a>
        <a href="login_instruction.php">
            <img src="images/votelogo.JFIF" alt="Vote Cast Icon"> Login
        </a>
        <a href="voter_contact.php">
            <img src="images/contact.PNG" alt="Contact Icon"> Contact
        </a>
        <a href="front_admin_login.php">
            <img src="images/admin.PNG" alt="Admin Icon"> Admin
        </a>


    </div>


    <div class="back">
        <div class="head">
            <h4>Registration</h4>
        </div>

        <form class="form" method="post">
            <input placeholder="Epic Id" class="input" required name="epid">
            <br>

            <input placeholder="Adhar Number" class="input" required type="text" name="anum">
            <br>
            <br>

            <button type="submit" name="submit">Submit</button>

        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $epid = $_POST['epid'];
    $anum = $_POST['anum'];
    $_SESSION['epid'] = $epid;
    $_SESSION['anum'] = $anum;
    $sql = "Select * from voter_db where epid='$epid' and adhar='$anum'";
    $result = mysqli_query($con, $sql);

    $user = mysqli_fetch_assoc($result);
    $check = $user['regsts'];
    if ($result->num_rows != 0) {
        if ($check == 1) {
            echo "<script>window.location.href = 'voter_register.php'; alert('VOTER ALREADY REGISTERED');</script>";
            session_destroy();
        } else {
            echo "<script>window.location.href = 'voter_display.php';</script>";
        }
    } else {
        echo "<script>window.location.href = 'voter_register.php'; alert('INVALID CREDINCIALS');</script>";
        session_destroy();
    }
}


?>