<?php
include("db.php"); // Include your database connection file

$candidates_data = [];

// Handle form submission to display candidates
if (isset($_POST['submit'])) {
    $state_id = $_POST['state'];
    $constituency_id = $_POST['const'];

    // Fetch candidates for the selected state and constituency
    $sql_candidates = "SELECT slid, cname, pid, st, const FROM candidate_db WHERE st = $state_id AND const = $constituency_id";
    $result_candidates = $con->query($sql_candidates);

    // Iterate through each candidate
    while ($candidate = $result_candidates->fetch_assoc()) {
        $pid = $candidate['pid'];

        // Fetch party details for the current candidate
        $sql_party = "SELECT pname, pimg FROM party_db WHERE pid = $pid";
        $result_party = $con->query($sql_party);

        // Check if party details were found
        if ($result_party->num_rows > 0) {
            $party = $result_party->fetch_assoc();
            $candidate['pname'] = $party['pname'];
            $candidate['pimg'] = $party['pimg'];
        } else {
            // Handle case where party details are not found (optional)
            $candidate['pname'] = "Unknown Party";
            $candidate['pimg'] = ""; // Provide a default image path or handle accordingly
        }

        // Add the candidate data to the array
        $candidates_data[] = $candidate;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Display</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="admin_voter_displ_style.css">
    <link rel="stylesheet" href="admin_candidate_displ.css">
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
                <a href="admin_voter_details.php">
                    <span class="material-symbols-outlined">dataset</span>
                    <h3>Voter details</h3>
                </a>
                <a href="admin_count.php" class="active">
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
                <header><b>Vote Count</b></header>
                <form method="POST">
                    <div class="column">
                        <div class="drop">
                            <label>State:</label>
                            <select name="state" id="state" required>
                                <option selected disabled value="">Select State</option>
                            </select>
                        </div>
                        <div class="drop">
                            <label>Constituency:</label>
                            <select name="const" id="const" required>
                                <option selected disabled value="">Select Constituency</option>
                            </select>
                        </div>
                        <div class="button">
                            <button type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
                <section class="container">
                    <br>
                    <?php
                    if (!empty($candidates_data)) {
                        echo "<table>";
                        echo "<thead><tr><th>Party Name</th><th>Party Symbol</th><th>Candidate Name</th><th>VOTE COUNT</th></tr></thead>";
                        echo "<tbody>";
                        foreach ($candidates_data as $candidate) {
                            $pid = $candidate['pid'];
                            $st = $candidate['st'];
                            $cons = $candidate['const'];
                            $s = "SELECT * FROM cast_db WHERE pid='$pid' AND state='$st' AND const='$cons'";
                            $q = $con->query($s);;
                            $count = mysqli_num_rows($q);


                            echo "<tr>";
                            echo "<td>" . $candidate['pname'] . "</td>";
                            echo "<td><img src='" . $candidate['pimg'] . "' alt='" . $candidate['pname'] . " Symbol'></td>";
                            echo "<td>" . $candidate['cname'] . "</td>";
                            echo "<td>" . $count . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } elseif (isset($_POST['submit'])) {
                        echo "<p>No candidates found for the selected state and constituency.</p>";
                    }
                    ?>
                </section>
            </div>
        </main>
        <!-- main end-->
    </div>
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