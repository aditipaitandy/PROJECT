<?php
include("db.php");
session_start();
if (!isset($_SESSION['epid']) || !isset($_SESSION['uid'])) {
    header("Location: voter_login.php");
    exit;
}

$epid = $_SESSION['epid'];

$uid = $_SESSION['uid'];
if (isset($_POST['submit'])) {
    $vote = 1;
    $q1 = "UPDATE voter_db SET vote='$vote' WHERE epid='$epid'";
    $querry2 = mysqli_query($con, $q1);
    $cid = $_POST['candidate_id'];
    $q = "SELECT * FROM candidate_db WHERE slid='$cid'";
    $querry = mysqli_query($con, $q);
    $d = mysqli_fetch_assoc($querry);
    $st = $d['st'];
    $const = $d['const'];
    $pid = $d['pid'];

    $q2 = "INSERT INTO cast_db (pid, state, const) VALUES('$pid','$st','$const')";

    $querry2 = mysqli_query($con, $q2);
    session_unset();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="vote_thankyou.css">
</head>

<body>

    <div class="container">
        <h1>
            Thank You for voting!
            <br>
            <a href="front_page.php">RETURN</a>
        </h1>
    </div>

</body>

</html>