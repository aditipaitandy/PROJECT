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
                <a href="admin_add_party.php">
                    <span class="material-symbols-outlined">add_circle</span>
                    <h3>Add Party </h3>
                </a>

                <a href="admin_party_display.php">
                    <span class="material-symbols-outlined">wysiwyg</span>
                    <h3>Party Display</h3>
                </a>
                <a href="admin_add_candidate.php" style="padding-right: 64px;" class="active">
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
                <header><b>ADD CANDIDATE</b></header>
                <section class="container">


                    <form class="form" method="post" enctype="multipart/form-data">
                        <div class="inputbox">
                            <label> Enter the candidate name</label>
                            <input type="text" name="cname" placeholder="Candidate name">
                        </div>
                        <br>
                        <br>
                        <div class="column">
                            <div class="drop">
                                <label>Select party</label><br>
                                <select name="party" id="">
                                    <?php
                                    $q = "SELECT * FROM party_db";
                                    $querry = mysqli_query($con, $q) or die("Querry unsuccessful");
                                    if ($querry->num_rows > 0) {
                                        echo '<option value="">Select Party</option>';
                                        while ($row = mysqli_fetch_assoc(($querry))) {
                                            echo "<option value='{$row['pid']}'>{$row['pname']}</option> ";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>

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
                        <button type="submit" name="submit">Upload Candidate</button>


                    </form>
                </section>
            </div>
        </main>
        <!-- main end-->
    </div>
</body>

</html>




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


<?php
if (isset($_POST['submit'])) {
    $name = $_POST['cname'];
    $party = $_POST['party'];
    $state = $_POST['state'];
    $const = $_POST['const'];

    $qr = mysqli_query($con, "INSERT INTO candidate_db(cname, pid, st, const) VALUES ('$name', '$party', '$state', '$const')");
    if ($qr) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "<script>alert('Data not inserted')</script>";
    }
}
?>