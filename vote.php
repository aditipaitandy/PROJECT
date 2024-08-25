<!-- Timer -->

<script>
    var sec = 15;

    function timer() {
        sec -= 1;
        document.getElementById("timer").innerText = (sec);
    }
    setInterval(timer, 1000);

    function redirectpage() {
        window.location = "vote_timeout.php";
    }
    setTimeout('redirectpage()', 15000);
</script>



<?php
include("db.php");
session_start();
if (!isset($_SESSION['epid']) || !isset($_SESSION['uid'])) {
    header("Location: voter_login.php");
    exit;
}
$epid = $_SESSION['epid'];

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM voter_db WHERE epid='$epid' AND uid='$uid'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);
$user_const = $user['const'];




// Fetch candidate data
$candidate_sql = "SELECT * FROM candidate_db WHERE const='$user_const'";
$candidate_result = $con->query($candidate_sql);

if ($candidate_result === false) {
    echo "<p>Error fetching candidates: " . $con->error . "</p>";
}

// Fetch party data
$parties = [];
$party_sql = "SELECT * FROM party_db";
$party_result = $con->query($party_sql);

if ($party_result !== false) {
    while ($party = $party_result->fetch_assoc()) {
        $parties[$party['pid']] = $party;
    }
} else {
    echo "<p>Error fetching parties: " . $con->error . "</p>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote for Candidates</title>
    <link rel="stylesheet" href="cast.css">
    <style>
        .custom-radio {
            position: absolute;
            opacity: 0;
        }

        .custom-radio-label {
            display: inline-block;
            padding: 8px 12px;
            font-size: 16px;
            border: 2px solid #3498db;
            border-radius: 5px;
            color: #3498db;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-radio:checked+.custom-radio-label {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Vote for Candidates</h1>
        <div style="font-size: 15px;">
            The page will expire in 15 seconds
            <img src="images/Loading.gif" style="height: 25;">
        </div>
        <div style="font-size: 17px; font-weight: 600; color: red;" id="timer"></div>
        <form method="POST" action="vote_thankyou.php">
            <table>
                <tr>
                    <th>Party Image</th>
                    <th>Candidate Name</th>
                    <th>Party Name</th>
                    <th>Vote</th>
                </tr>
                <?php
                if ($candidate_result->num_rows > 0) {
                    while ($candidate = $candidate_result->fetch_assoc()) {
                        $party = isset($parties[$candidate['pid']]) ? $parties[$candidate['pid']] : ['pname' => 'Unknown', 'pimg' => ''];
                        echo "<tr>
                                <td><img src='{$party['pimg']}' alt='Party Image'></td>

                                <td>{$candidate['cname']}</td>
                                
                                <td>{$party['pname']}</td>
                                
                                <td class='action-buttons'>
                                    <input type='radio' id='candidate_{$candidate['slid']}' name='candidate_id' value='{$candidate['slid']}' class='custom-radio'>
                                    <label for='candidate_{$candidate['slid']}' class='custom-radio-label'>Vote</label>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No candidates found</td></tr>";
                }
                ?>
            </table>
            <button type="submit" name="submit" class="btn vote-btn">FINAL</button>
        </form>
    </div>
</body>

</html>