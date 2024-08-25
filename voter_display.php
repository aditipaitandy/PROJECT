<?php
session_start();
include("db.php");

if (!isset($_SESSION['epid']) || !isset($_SESSION['anum'])) {
    header("Location: register.php");
    exit;
}

// Use the session variables
$epid = $_SESSION['epid'];
$anum = $_SESSION['anum'];

// Fetch user data from the database
$sql = "Select * from voter_db where epid='$epid' and adhar=$anum";
$result = mysqli_query($con, $sql);

// Check if the user exists
if ($result->num_rows > 0) {

    $user = mysqli_fetch_assoc($result);
    $char = 'qwertyuiopasdfghjklmnbvcxzQWERTYUIOPLKJHGFDSAZXCVBNM0123456789';
    $uid = '';
    $max = strlen($char) - 1;
    for ($i = 0; $i < 5; $i++) {
        $uid .= $char[rand(0, $max)];
    }
    $x = "UPDATE voter_db SET uid='$uid' WHERE epid = '$epid' AND adhar='$anum'";
    $sql = mysqli_query($con, $x);



    $a = $user['state'];
    $sql = "SELECT * FROM state_db WHERE sid=$a";
    $res = mysqli_query($con, $sql);
    $state = mysqli_fetch_assoc($res);

    $a = $user['const'];
    $sql = "SELECT * FROM const_db WHERE cid=$a";
    $res = mysqli_query($con, $sql);
    $const = mysqli_fetch_assoc($res);
} else {
    echo "No user found.";
    exit;
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="voter_disp.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h4>User Profile</h4>
        </div>

        <div class="user-info">
            <img src="<?php echo $user['img']; ?>" alt="Profile Picture">
            <p><strong>UID:</strong> <?php echo $uid; ?></p>
            <p><strong>EPID:</strong> <?php echo $user['epid']; ?></p>
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Aadhar Number:</strong> <?php echo $user['adhar']; ?></p>
            <p><strong>Father's Name:</strong> <?php echo $user['fname']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $user['dob']; ?></p>
            <p><strong>State:</strong> <?php echo $state['stname']; ?></p>
            <p><strong>Constituency:</strong> <?php echo $const['cname']; ?></p>
            <div style="color: red; font-weight: 600;">
                *Please remember the uid
            </div>

        </div>
        <br>
        <br>
        <div class="foot">
            <a class="btn" href="voter_pswd.php">Proceed</a>

        </div>
    </div>

</body>

</html>