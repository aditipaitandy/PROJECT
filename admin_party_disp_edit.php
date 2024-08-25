<?php
include("db.php");

// Fetch party data for editing
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM party_db WHERE pid = $pid";
    $result = $con->query($sql);
    $party = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Party</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="admin_style.css" />
    <link rel="stylesheet" href="reg_style.css">
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

                <a href="admin_party_display.php" class="active">
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

        <div class="scroll">
            <header><b>Edit Party</b></header>
            <div class="container">
                <div class="form">
                    <form method="POST" action="admin_party_disp_edit.php" enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="<?php echo $party['pid']; ?>">
                        <div class="inputbox">
                            <label for="pname">Party Name:</label>
                            <input type="text" name="pname" value="<?php echo $party['pname']; ?>"><br>
                        </div>
                        <br>
                        <br>
                        <img src="<?php echo $party['pimg'] ?>" height="80" style="border-radius: 15px;">
                        <br>
                        <h4>Update image</h4>
                        <br>
                        <input type="file" name="pimg" accept=".jpg, .jpeg"><br>
                        <button type="submit" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

// Handle update request
if (isset($_POST['update'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $img_dest = $party['pimg'];


    // Handle file upload
    if (isset($_FILES['pimg']) && $_FILES['pimg']['error'] === UPLOAD_ERR_OK) {

        // Delete old image if it exists
        unlink($img_dest);

        // Handle new image upload
        $img_name = $_FILES['pimg']['name'];
        $img_tmp_name = $_FILES['pimg']['tmp_name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_folder = "party_img/" . $pid . "." . $img_ext;
        move_uploaded_file($img_tmp_name, $img_folder);
        $update_sql = "UPDATE party_db SET pimg='$img_folder' WHERE pid='$pid'";
        $con->query($update_sql);
    }

    // Update database
    $update_sql = "UPDATE party_db SET pname='$pname' WHERE pid='$pid'";

    if ($con->query($update_sql) === TRUE) {
        // Redirect to party display page after successful update
        echo "<script>window.location.href = 'admin_party_display.php'; alert('UPDATE SUCCESSFUL');</script>";
    } else {
        echo "<script>window.location.href = 'admin_party_display.php'; alert('UPDATE SUCCESSFUL');</script>";
    }
}

$con->close();
?>