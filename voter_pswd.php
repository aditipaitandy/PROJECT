<?php

session_start();
include("db.php");

// Check if the session variables are set
if (!isset($_SESSION['epid']) || !isset($_SESSION['anum'])) {
    header("Location: register.php");
    exit;
}

// Session initilization
$epid = $_SESSION['epid'];
$anum = $_SESSION['anum'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="voter_pswd.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h4>Create password</h4>
        </div>

        <form class="form" method="post">
            <ul>
                <li class="li_head">Passwod must contain:
                </li>
                <li class="invalid" id="eightchar">8 Characters</li>
                <li class="invalid" id="lower">lowercase character</li>
                <li class="invalid" id="upper">Uppercase character</li>
                <li class="invalid" id="number">Number</li>
                <li class="invalid" id="special">Special Characters</li>


            </ul>
            <input type="password" id="pass1" name="pass1" placeholder="Enter Password">
            <br>
            <input type="password" id="pass2" disabled name="pass2" placeholder="Confirm Password">

            <p id="match" class="wh">Password Doesnt match
            </p>

            <div class="foot">
                <button id="button" type="submit" disabled name="submit">Register</button>

            </div>
        </form>
    </div>



    <script>
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        var eightchar = document.getElementById('eightchar');
        var lower = document.getElementById('lower');
        var upper = document.getElementById('upper');
        var number = document.getElementById('number');
        var special = document.getElementById('special');
        var match = document.getElementById('match');
        var a = 0,
            b = 0,
            c = 0,
            d = 0,
            e = 0;

        pass1.onkeyup = () => {

            var pswd = pass1.value;
            var upcase = /[A-Z]/g;
            var lwcase = /[a-z]/g;
            var num = /[0-9]/g;
            var pat = /[-’/`~!#*$@_%+=.,^&(){}[\]|;:”<>?\\]/g;

            if (pswd.match(lwcase)) {
                a = 1;
                lower.classList.remove('invalid');
                lower.classList.add('valid');
            } else {
                a = 0;
                lower.classList.remove('valid');
                lower.classList.add('invalid');
            }

            if (pswd.match(upcase)) {
                b = 1;
                upper.classList.remove('invalid');
                upper.classList.add('valid');
            } else {
                b = 0;
                upper.classList.remove('valid');
                upper.classList.add('invalid');
            }

            if (pswd.match(num)) {
                c = 1;
                number.classList.remove('invalid');
                number.classList.add('valid');
            } else {
                c = 0;
                number.classList.remove('valid');
                number.classList.add('invalid');
            }

            if (pswd.length >= 8) {
                d = 1;
                eightchar.classList.remove('invalid');
                eightchar.classList.add('valid');
            } else {
                d = 0;
                eightchar.classList.remove('valid');
                eightchar.classList.add('invalid');
            }

            if (pswd.match(pat)) {
                e = 1;
                special.classList.remove('invalid');
                special.classList.add('valid');
            } else {
                e = 0;
                special.classList.remove('valid');
                special.classList.add('invalid');
            }
            if (a == 1 && b == 1 && c == 1 && d == 1 && e == 1) {
                pass2.removeAttribute('disabled');

            } else {
                pass2.setAttribute('disabled');
            }

        }

        pass2.onkeyup = () => {
            var pswd1 = pass1.value;
            var pswd2 = pass2.value;

            if (pswd1 != pswd2) {
                match.classList.remove('wh');
                match.classList.add('danger');
                button.setAttribute('disabled');
            } else {
                match.classList.remove('danger');
                match.classList.add('wh');
                button.removeAttribute('disabled');
            }



        }
    </script>

</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $p = $_POST['pass2'];
    $st = 1;
    $x = "UPDATE voter_db SET pswd='$p', regsts='$st' WHERE epid = '$epid'";
    $sql = mysqli_query($con, $x);
    if ($sql) {
        echo "<script>window.location.href = 'front_page.php';alert('Successful')</script>";
    } else {
        echo "<script>window.location.href = 'voter_register.php';alert('Not Successful')</script>";
    }
}

?>