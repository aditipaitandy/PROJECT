<?php
include("db.php");

if (isset($_GET['delete'])) {
    $epid = $_GET['delete'];
    $delete_sql = "DELETE FROM `voter_db` WHERE `voter_db`.`epid` = '$epid'";
    if ($con->query($delete_sql) === TRUE) {
        echo "<script>window.location.href = 'admin_voter_details.php'; alert('Data Deleted successfully');</script>";
    } else {
        echo "<script>window.location.href = 'admin_voter_details.php'; alert('Unexpected Error occured');</script>";
    }
}

// Fetch voter data with state, district, and constituency names
$sql = "SELECT * FROM voter_db";
$result = $con->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="admin_style.css" />
    <link rel="stylesheet" href="admin_voter_displ_style.css">
</head>

<body>
    <div class="cont">
        <!-- aside bar -->
        <aside>
            <div class="top">
                <h1>Dashboard</h1>
            </div>
            <div class="sidebar">
                <a href="admin_dashboard.php">
                    <span class="material-symbols-outlined">apps</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="admin_add_party.php">
                    <span class="material-symbols-outlined">add_circle</span>
                    <h3>Add Party </h3>
                </a>
                <a href="admin_party_display.php">
                    <span class="material-symbols-outlined">wysiwyg</span>
                    <h3>Party Display</h3>
                </a>
                <a href="admin_add_candidate.php">
                    <span class="material-symbols-outlined">add_task</span>
                    <h3>Add Candidate</h3>
                </a>
                <a href="admin_candidate_displ.php">
                    <span class="material-symbols-outlined">view_agenda</span>
                    <h3>Candidate Display</h3>
                </a>
                <a href="admin_add_place_state.php">
                    <span class="material-symbols-outlined">library_add</span>
                    <h3>Add Place</h3>
                </a>
                <a href="admin_vot_register.php">
                    <span class="material-symbols-outlined">arrow_circle_right</span>
                    <h3>Add Voter</h3>
                </a>
                <a href="admin_voter_details.php" class="active">
                    <span class="material-symbols-outlined">dataset</span>
                    <h3>Voter details</h3>
                </a>
                <a href="admin_count.php">
                    <span class="material-symbols-outlined">person_check</span>
                    <h3>Vote Count</h3>
                </a>


                <a href="admin_log.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Log Out</h3>
                </a>
            </div>


        </aside>
        <!-- aside bar end -->

        <!-- main -->
        <div class="out">
            <header><b>Voter Details</b></header>
            <div class="container">
                <table>
                    <tr>
                        <th>EPID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Adhar</th>
                        <th>Father's Name</th>
                        <th>Date of Birth</th>
                        <th>State Name</th>
                        <th>Constituency Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $a = $row['state'];
                        $sql = "SELECT * FROM state_db WHERE sid=$a";
                        $res = mysqli_query($con, $sql);
                        $state = mysqli_fetch_assoc($res);

                        $a = $row['const'];
                        $sql = "SELECT * FROM const_db WHERE cid=$a";
                        $res = mysqli_query($con, $sql);
                        $const = mysqli_fetch_assoc($res);
                        echo "<tr>
                            <td>{$row['epid']}</td>
                            <td><img src='" . $row["img"] . "' alt='Voter Image'></td>
                            <td>{$row['name']}</td>
                            <td>{$row['adhar']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['dob']}</td>
                            <td>{$state['stname']}</td>
                            <td>{$const['cname']}</td>
                            <td >
                            <div class='action-buttons'>
                                <a href='admin_edit.php?epid={$row['epid']}' class='btn'>Edit</a>
                                <a href='admin_voter_details.php?delete={$row['epid']}' class='btn delete'>Delete</a>
                            </div>
                            </td>";
                    }
                    ?>
                    </tr>
                </table>
            </div>
        </div>
        <!-- main end-->
    </div>
</body>

</html>

</body>

</html>