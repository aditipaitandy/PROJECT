<?php
include("db.php");
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
    <link rel="stylesheet" href="reg_style.css" />
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
                <a href="admin_add_party.php" class="active">
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
                <a href="admin_voter_details.php">
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
        <main>
            <div class="scroll">

                <header><b>ADD PARTY</b></header>
                <section class="container">
                    <form class="form" method="post" enctype="multipart/form-data">
                        <div class="inputbox">
                            <label>Enter the name of the party</label>
                            <input type="text" required name="pname" placeholder="Party Name">
                        </div>
                        <br>
                        <br>
                        <div class="inputbox">
                            <label>Upload Logo of the party</label>
                        </div>
                        <br>
                        <input type="file" required id="plogo" name="plogo" accept="image/png, image/jpeg">
                        <br>
                        <button type="submit" name="submit">Add Party</button>
                    </form>
                </section>
            </div>
        </main>
        <!-- main end-->
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $name = $_POST['pname'];


    // Uploading the img to folder
    $fname = $_FILES["plogo"]["name"];
    $tempname = $_FILES["plogo"]["tmp_name"];
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $folder = "party_img/" . $name . "." . $ext;
    move_uploaded_file($tempname, $folder);


    $qry = "INSERT INTO party_db(pname, pimg) VALUES('$name', '$folder')";

    $ins = mysqli_query($con, $qry);

    if ($ins) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "<script>alert('Data not inserted')</script>";
    }
}
?>