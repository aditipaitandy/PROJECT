<?php
include("db.php");
session_start();
if (!isset($_SESSION['epid']) || !isset($_SESSION['uid'])) {
    header("Location: voter_login.php");
    exit;
}
$epid = $_SESSION['epid'];
$uid = $_SESSION['uid'];
$qry1 = "SELECT * FROM voter_db WHERE epid='$epid' AND uid='$uid'";
$result = mysqli_query($con, $qry1);
$user = mysqli_fetch_assoc($result);
$x = $user['atmpt'];
$attempt = $x - 1;
$qry2 = "UPDATE voter_db SET atmpt='$attempt' WHERE epid='$epid'";
$result2 = mysqli_query($con, $qry2);

session_unset();
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
        <h1>Session Timeout</h1>
        <p>Please Login Again</p>
        <a href="voter_login.php">Voter Login</a>
    </div>

</body>

</html>