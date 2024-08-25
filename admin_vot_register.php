<?php
include("db.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
                <a href="admin_vot_register.php" class="active">
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
        <div class="scroll">

            <header><b>REGISTRATION FORM</b></header>
            <section class="container">
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="inputbox">
                        <label>Epic Number: </label>
                        <input type="text" placeholder="ENTER EPIC NUMBER" name="epic">
                    </div>

                    <div class="inputbox">
                        <label>Full Name: </label>
                        <input required type="text" placeholder="ENTER FULL NAME" name="name">
                    </div>

                    <div class="inputbox">
                        <label>Adhar No.:</label>
                        <input required type="text" placeholder="ENTER ADHAR NUMBER" name="adhar">
                    </div>

                    <div class="inputbox">
                        <label>Father's Name: </label>
                        <input required type="text" placeholder="FATHER'S NAME" name="fatname">
                    </div>

                    <div class="inputbox">
                        <label>Birth Date: </label>
                        <input required type="date" name="dob" max="2005-12-31">
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
                    </div>
                    <br>
                    <br>
                    <div>
                        <h4>Upload the image</h4>
                        <input type="file" id="img" name="img" accept="image/png, image/jpeg">
                    </div>
                    <button type="submit" name="preview">Submit</button>
                </form>
            </section>
        </div>
        <!-- main end-->
    </div>



    <!-- Checking epid and adhar -->
    <script>

    </script>
</body>

</html>

<!--Dependent SelectBox Code -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function loaddata(type, catid) {
            $.ajax({
                url: "selectbox.php",
                type: "POST",
                data: {
                    type: type,
                    id: catid
                },
                success: function(data) {

                    if (type == "state") {

                        $("#state").append(data);
                    } else if (type == "const") {
                        $("#const").html(data);
                    }
                }
            });
        }
        loaddata("state");

        $('#state').on("change", function() {
            var state = $('#state').val();
            loaddata("const", state);

        });
    });
</script>
<!-- data upload -->
<?php
if (isset($_POST['preview'])) {


    $epic = $_POST['epic'];
    $name = $_POST['name'];
    $adhar = $_POST['adhar'];
    $fatname = $_POST['fatname'];
    $state = $_POST['state'];
    $const = $_POST['const'];
    $dob = date('Y-m-d', strtotime($_POST['dob']));
    $attempt = 3;

    $qr = "SELECT * FROM voter_db WHERE epid='$epic'";
    $qry = mysqli_query($con, $qr);
    if ($qry->num_rows != 0) {
        echo "<script>alert('Epid already exists')</script>";
    } else {
        //IMAGE ENTRY
        $fname = $_FILES["img"]["name"]; //name of the image uploaded
        $tempname = $_FILES["img"]["tmp_name"]; //temp name of the image stored by php
        $ext = pathinfo($fname, PATHINFO_EXTENSION); //extracting the type of the uploaded file
        $folder = "voter_img/" . $epic . "." . $ext; //concatinating full file path
        move_uploaded_file($tempname, $folder); //moving the file with epic as name


        //Database entry
        $q = "INSERT INTO voter_db (epid, img, name, adhar, fname, dob, state, const, atmpt) VALUES ('$epic', '$folder', '$name', '$adhar', '$fatname', '$dob', '$state','$const', '$attempt')";

        $query = mysqli_query($con, $q);
        if ($query) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            echo "<script>alert('Data not inserted')</script>";
        }
    }
}
?>