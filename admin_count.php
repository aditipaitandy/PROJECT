<?php
include("db.php");

//Vote count
$name = [];
$vote = [];
$x = "SELECT * FROM party_db";
$qu = mysqli_query($con, $x);
while ($p = $qu->fetch_assoc()) {

    $pid = $p['pid'];
    $x = "SELECT * FROM cast_db WHERE pid='$pid'";
    $qr = mysqli_query($con, $x);
    $count = mysqli_num_rows($qr);
    $name[] = $p['pname'];
    $vote[] = $count;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Registration Dashboard</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="admin_style.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    .scroll {

        position: relative;
        margin-top: 80px;
        margin-bottom: 18px;
        padding: 20px;
        border-radius: 8px;
        background: white;
        height: 85vh;
        box-shadow: 0 8px 16px black;
    }

    .scroll header {
        font-size: 3rem;
        color: #333;
        font-weight: 5000;
        text-align: center;
        padding-bottom: 5px;
    }

    .btn1 {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 15px;
    }

    .btn1:hover {
        background-color: #3e8e41
    }

    .btn1:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    .count {
        height: 600px;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);

    }
    </style>
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
        <main>
            <div class="scroll">
                <header>
                    <b>VOTE COUNT</b>
                </header>
                <div class="">


                    <div class="count">
                        <h2>OVERALL</h2>
                        <canvas id="votechart"></canvas>

                    </div>
                    <br>
                    <br>
                    <a href="admin_result.php" class="btn1">View Breakdown</a>

                </div>
            </div>
        </main>
    </div>

    <script>
    let constituencyChart = null;
    var ctx2 = document.getElementById('votechart');
    const voteChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($name); ?>,
            datasets: [{
                label: 'Vote count',
                data: <?php echo json_encode($vote); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                ],

            }]
        },
    });
    </script>


</body>

</html>