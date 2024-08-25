<?php
include("db.php");
session_start();

if (!isset($_SESSION['adid'])) {
    header("Location:front_admin_login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="place_style.css">
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
                <a href="admin_add_candidate.php"">
                    <span class=" material-symbols-outlined">add_task</span>
                    <h3>Add Candidate</h3>
                </a>
                <a href="admin_candidate_displ.php">
                    <span class="material-symbols-outlined">view_agenda</span>
                    <h3>Candidate Display</h3>
                </a>
                <a href="#" class="active">
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
                <section class="container">
                    <br>
                    <nav class="navbar">
                        <div class="navdiv">
                            <ul>
                                <li><a href="admin_add_place_state.php">State</a></li>
                                <li class="act"><a href="#">Constitution</a></li>

                            </ul>
                        </div>
                    </nav>
                    <!-- NAV BAR END -->
                    <br>
                    <br>

                    <form method="post" class="form">
                        <div class="inputbox">
                            <label style="padding-right: 10px;">Select State</label>
                            <select required name="st" style="border: 1px solid black; width: 40%; padding:5px; border-radius:6px;">
                                <option selected disabled value="">Select State</option>
                                <?php
                                $q = "SELECT * FROM state_db";
                                $querry = mysqli_query($con, $q) or die("Querry unsuccessful");
                                while ($row = mysqli_fetch_assoc(($querry))) {
                                    echo "<option value='{$row['sid']}'>{$row['stname']}</option> ";
                                }

                                ?>
                            </select>

                        </div>


                        <div class="inputbox">
                            <label>Enter the new constituenct</label>
                            <input type="text" name="name" required placeholder="Constituency">
                        </div>
                        <br>
                        <button type="submit" name="preview">Submit</button>
                    </form>
                </section>
            </div>

        </main>
        <!-- main end-->
    </div>
</body>

</html>



<?php
if (isset($_POST['preview'])) {
    $name = $_POST['name'];
    $st = $_POST['st'];

    $q = "SELECT * FROM const_db WHERE cname='$name' AND state='$st'";

    $res = mysqli_query($con, $q);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Already exists')</script>";
    } else {
        $qu = "INSERT INTO const_db (cname, state) VALUES('$name', '$st')";
        $rst = mysqli_query($con, $qu);
        if ($rst) {
            echo "<script>alert('Data inserted Successfully')</script>";
        } else
            echo "<script>alert('Error in inserting data')</script>";
    }
}


?>