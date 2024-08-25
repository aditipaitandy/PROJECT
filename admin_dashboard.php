<?php
include("db.php");

session_start();

if (!isset($_SESSION['adid'])) {
    header("Location:front_admin_login.php");
    exit;
}

// Fetch state names
$state_query = "SELECT sid, stname FROM state_db";
$state_result = mysqli_query($con, $state_query);

$state_map = [];
while ($row = mysqli_fetch_assoc($state_result)) {
    $state_map[$row['sid']] = $row['stname'];
}

// Handle AJAX request for constituency data
if (isset($_GET['state'])) {
    $state = array_search($_GET['state'], $state_map);

    // Fetch constituency names
    $const_query = "SELECT cid, cname FROM const_db";
    $const_result = mysqli_query($con, $const_query);

    $const_map = [];
    while ($row = mysqli_fetch_assoc($const_result)) {
        $const_map[$row['cid']] = $row['cname'];
    }

    // Fetch voter counts per constituency for the given state
    $query = "SELECT const, COUNT(*) as voter_count FROM voter_db WHERE state='$state' GROUP BY const";
    $result = mysqli_query($con, $query);

    $constituencies = [];
    $voter_counts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $constituencies[] = $const_map[$row['const']];
        $voter_counts[] = $row['voter_count'];
    }

    echo json_encode(['labels' => $constituencies, 'voterCounts' => $voter_counts]);
    exit;
}

// Fetch the number of voters registered in each state
$query = "SELECT state, COUNT(*) as voter_count FROM voter_db GROUP BY state";
$result = mysqli_query($con, $query);

$states = [];
$voter_counts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $states[] = $state_map[$row['state']];
    $voter_counts[] = $row['voter_count'];
}

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
    <link rel="stylesheet" href="reg_style.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    .chart-wrapper {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .chart-container,
    .bar-chart-container {
        flex: 1;
        height: 400px;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
    }

    .bar-chart-container {
        display: none;
    }

    .alert {
        background-color: #e1f5fe;
        color: #01579b;
        padding: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
    }

    .alert p {
        font-size: 1rem;
        margin: 0;
    }

    .alert strong {
        color: #01579b;
    }

    .count {
        background-color: lightgrey;
        padding: 15px;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
    }

    .marquee {
        overflow: hidden;
        white-space: nowrap;
        box-sizing: border-box;
    }

    .marquee p {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 15s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
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
                <a href="admin_dashboard.php" class="active">
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
        <main>
            <div class="scroll">
                <header>
                    <b>ADMIN DASHBOARD</b>
                </header>
                <div class="container">

                    <h2>Voter Registration Chart</h2>
                    <div class="chart-wrapper">
                        <div class="chart-container">
                            <canvas id="voterChart"></canvas>
                        </div>
                        <div class="bar-chart-container">
                            <canvas id="constituencyChart"></canvas>
                        </div>
                    </div>

                    <br>




                    <h2>SYSTEM UPDATES</h2>
                    <div class="alert marquee">
                        <p><strong>NO UPDATES TILL NOW</strong></p>
                    </div>

                    <h2>SECURITY ALERTS</h2>
                    <div class="alert">
                        <p><strong>1. Login Activity:</strong> Notify admins of suspicious logins from unrecognized
                            devices or locations.</p>
                        <p><strong>2. Failed Login Attempts:</strong> Alert admins about multiple failed login attempts
                            to prevent brute-force attacks.</p>
                        <p><strong>3. User Role Changes:</strong> Notify admins of modifications to user roles,
                            especially for privileged accounts.</p>
                        <p><strong>4. Data Modifications:</strong> Alert admins of critical changes to user records or
                            sensitive data.</p>
                        <p><strong>5. System Updates:</strong> Notify admins about available security patches and
                            updates for timely implementation.</p>
                        <p><strong>6. Session Management:</strong> Monitor active sessions for unusual durations or
                            failures to expire.</p>
                        <p><strong>7. Backup Status:</strong> Inform admins about successful backups, failures, or
                            irregularities in backup processes.</p>
                        <p><strong>8. Security Incidents:</strong> Provide real-time alerts on detected security
                            incidents, breaches, or potential threats.</p>
                        <p><strong>9. Compliance Monitoring:</strong> Alert admins of non-compliance with security
                            policies or regulatory requirements.</p>
                        <p><strong>10. Emergency Response:</strong> Issue emergency alerts for critical security events
                            or disruptions affecting system operations.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
    let constituencyChart = null;



    const ctx = document.getElementById('voterChart').getContext('2d');
    const voterChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($states); ?>,
            datasets: [{
                label: 'number of Registered Voters',
                data: <?php echo json_encode($voter_counts); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        afterLabel: function(context) {
                            return ' Click to see constituency details';
                        }
                    }
                }
            },
            onClick: function(event, elements) {
                if (elements.length > 0) {
                    const stateIndex = elements[0].index;
                    const stateName = voterChart.data.labels[stateIndex];

                    fetch(`?state=${stateName}`)
                        .then(response => response.json())
                        .then(data => {
                            if (constituencyChart) {
                                constituencyChart.destroy();
                            }

                            document.querySelector('.bar-chart-container').style.display =
                                'block';

                            const ctxBar = document.getElementById('constituencyChart')
                                .getContext(
                                    '2d');
                            constituencyChart = new Chart(ctxBar, {
                                type: 'bar',
                                data: {
                                    labels: data.labels,
                                    datasets: [{
                                        label: 'number of Registered Voters',
                                        data: data.voterCounts,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        })
                        .catch(error => console.error('Error fetching constituency data:',
                            error));
                }
            }
        }



    });
    </script>


</body>

</html>