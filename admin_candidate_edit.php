<?php
include("db.php");
session_start();

if (!isset($_SESSION['adid'])) {
    header("Location:front_admin_login.php");
    exit;
}

// Fetch candidate details based on slid (candidate ID)
if (isset($_GET['slid'])) {
    $slid = $_GET['slid'];

    // Fetch candidate details
    $sql_candidate = "SELECT * FROM candidate_db WHERE slid = $slid";
    $result_candidate = $con->query($sql_candidate);

    if ($result_candidate->num_rows == 1) {
        $candidate = $result_candidate->fetch_assoc();

        // Fetch party details for dropdown options
        $sql_parties = "SELECT * FROM party_db";
        $result_parties = $con->query($sql_parties);
    } else {
        echo "Candidate not found.";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Candidate</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="admin_style.css">
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
                <a href="admin_candidate_displ.php" class="active">
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
                <header><b>Edit Candidate</b></header>
                <section class="container">

                    <form method="post" class="form">
                        <div class="column">
                            <div class="drop">
                                <label>State</label><br>
                                <select name="state" id="state">
                                </select>
                            </div>

                            <div class="drop">
                                <label>Constituency</label><br>
                                <select name="const" id="const">
                                </select>
                            </div>
                            <div class="drop">
                                <label>Party Name:</label><br>
                                <select name="party" required>
                                    <?php
                                    $result_parties->data_seek(0); // Reset pointer to fetch parties again
                                    while ($party = $result_parties->fetch_assoc()) {
                                        $selected = ($party['pid'] == $candidate['pid']) ? 'selected' : '';
                                        echo "<option value='" . $party['pid'] . "' $selected>" . $party['pname'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="inputbox">
                            <label>Candidate Name:</label>
                            <input type="text" name="cname" value="<?php echo $candidate['cname']; ?>" required>
                        </div>
                        <div class="button-container">
                            <button type="submit" name="update">Update</button>
                        </div>

                    </form>
                </section>
            </div>
        </main>
        <!-- main end-->
    </div>
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
                                $("#state").val(selectedId);
                            }
                        } else if (type == "const") {
                            $("#const").html(data);
                            if (selectedId) {
                                $("#const").val(selectedId);
                            }
                        }
                    }
                });
            }

            var selectedState = "<?php echo $candidate['st']; ?>";
            var selectedConst = "<?php echo $candidate['const']; ?>";

            loaddata("state", null, selectedState);
            if (selectedState) {
                loaddata("const", selectedState, selectedConst);
            }

            $('#state').on("change", function() {
                var state = $('#state').val();
                loaddata("const", state);
            });
        });
    </script>
</body>

</html>

<?php
// Handle form submission to update candidate details
if (isset($_POST['update'])) {
    $state_id = $_POST['state'];
    $constituency_id = $_POST['const'];
    $party_id = $_POST['party'];
    $cname = $_POST['cname'];

    // Update candidate details
    $update_sql = "UPDATE candidate_db SET st = $state_id, const = $constituency_id, pid = $party_id, cname = '$cname' WHERE slid = $slid";

    if ($con->query($update_sql) === TRUE) {
        echo "<script>window.location.href = 'admin_candidate_displ.php'; alert('UPDATE SUCCESSFUL');</script>";
    } else {
        echo "<script>window.location.href = 'admin_candidate_displ.php'; alert('ERROR');</script>";
    }
}
?>