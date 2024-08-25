<?php
include("db.php");
if (isset($_GET['epid'])) {
    $epid = $_GET['epid'];
    $sql = "Select * from voter_db where epid = $epid";
    $result = $con->query($sql);
    $voter = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Voter</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                <a href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Log Out</h3>
                </a>
            </div>
        </aside>
        <!-- aside bar end -->

        <!-- Main -->
        <div class="scroll">
            <header><b>Edit Voter</b></header>
            <div class="container">
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="inputbox">
                        <label for="">Epic Number</label>
                        <input type="text" style="font-weight: 600;" disabled name="epid" value="<?php echo $voter['epid']; ?>">
                    </div>
                    <div class="inputbox">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo $voter['name']; ?>"><br>
                    </div>
                    <div class="inputbox">
                        <label for="adhar">Adhar:</label>
                        <input type="text" name="adhar" value="<?php echo $voter['adhar']; ?>"><br>
                    </div>
                    <div class="inputbox">
                        <label for="fname">Father's Name:</label>
                        <input type="text" name="fname" value="<?php echo $voter['fname']; ?>"><br>
                    </div>
                    <div class="inputbox">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" value="<?php echo $voter['dob']; ?>"><br>
                    </div>
                    <br>
                    <br>
                    <div class="column">
                        <div class="drop">
                            <label>State</label><br>
                            <select name="state" id="state">
                                <option selected disabled value="">Select State</option>
                            </select>
                        </div>
                        <div class="drop">
                            <label>Constituency</label><br>
                            <select name="const" id="const">
                                <option selected disabled value="">Select Constitution</option>
                            </select>
                        </div>
                        <input type="hidden" name="current_img" value="<?php echo $voter['img']; ?>">
                    </div>
                    <br>
                    <br>
                    <div>
                        <img src="<?php echo $voter['img'] ?>" height="80" style="border-radius: 15px;">
                        <br>
                        <h4>Change the image</h4>
                        <input type="file" id="img" name="img" accept="image/png, image/jpeg">
                    </div>
                    <button type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!--Dependent SelectBox Code -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function loaddata(type, catid, selectedId = null) {
                $.ajax({
                    url: "selectbox_edit_voter.php",
                    type: "POST",
                    data: {
                        type: type,
                        id: catid
                    },
                    success: function(data) {
                        if (type == "state") {
                            $("#state").html(data);
                            if (selectedId) {
                                $('#state').val(selectedId);
                            }
                        } else if (type == "const") {
                            $("#const").html(data);
                            if (selectedId) {
                                $('#const').val(selectedId);
                            }
                        }
                    }
                });
            }

            var state = <?php echo $voter['state']; ?>;
            loaddata("state", null, state);
            loaddata("const", state, <?php echo $voter['const']; ?>);

            $('#state').on("change", function() {
                var state = $('#state').val();
                loaddata("const", state);
            });
        });
    </script>
</body>

</html>
<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $adhar = $_POST['adhar'];
    $fname = $_POST['fname'];
    $dob = $_POST['dob'];
    $sid = $_POST['state'];
    $cid = $_POST['const'];
    $img_dest = $voter['img'];

    // Handle file upload
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        unlink($img_dest);
        $x = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $ext = pathinfo($x, PATHINFO_EXTENSION);
        $folder = "voter_img/" . $epid . "." . $ext;
        move_uploaded_file($tempname, $folder);
        $update_sql = "UPDATE voter_db SET img='$folder' WHERE epid='$epid'";
        $h1 = mysqli_query($con, $update_sql);
    }

    //Database update
    $update_sql = "UPDATE voter_db SET name='$name', adhar='$adhar', fname='$fname', dob='$dob', state='$sid', const='$cid' WHERE epid='$epid'";
    $h = mysqli_query($con, $update_sql);
    if ($h) {
        echo "<script>window.location.href = 'admin_voter_details.php'; alert('Data updated successfully');</script>";
    } else {
        echo "<script>window.location.href = 'admin_voter_details.php'; alert('Data update failed')</script>";
    }
}
?>