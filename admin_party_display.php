<?php
include("db.php");

// Fetch data from the database
$sql = "SELECT pid, pname, pimg FROM party_db";
$result = $con->query($sql);

// Handle deletion request
if (isset($_GET['delete'])) {
    $delete_pid = $_GET['delete'];

    // Fetch image path to delete from server
    $img_sql = "SELECT pimg FROM party_db WHERE pid = $delete_pid";
    $img_result = $con->query($img_sql);
    if ($img_result->num_rows > 0) {
        $img_row = $img_result->fetch_assoc();
        $img_to_delete = $img_row['pimg'];

        // Delete image file from server if it exists
        if (file_exists($img_to_delete)) {
            unlink($img_to_delete);
        }
    }

    // Delete party from database
    $delete_sql = "DELETE FROM party_db WHERE pid = $delete_pid";
    if ($con->query($delete_sql) === TRUE) {
        // Redirect back to party display page after deletion
        header("Location: admin_party_display.php");
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Party Display</title>
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="admin_voter_displ_style.css">
    <style>
    /* Custom styles for alignment and sizing */
    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .action-buttons .btn {
        width: 70px;
        margin: 5px;
        /* Adjust button margin */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: white;
        font-size: 1.2rem;
        font-weight: 700;
        text-align: center;
    }

    td {
        background-color: #f9f9f9;
        font-size: 0.95rem;
        font-weight: 600;
        vertical-align: middle;
        /* Center align content vertically */
        text-align: center;
        /* Center align text horizontally */
    }

    img {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        display: block;
        margin: 0 auto;
        /* Center align image */
    }

    /* Adjusting Party ID column */
    td:first-child {
        width: 10%;
        /* Adjust width as needed */
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

        <div class="out">
            <header><b>Party Information</b></header>
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%">Party ID</th>
                            <th>Party Symbol</th>
                            <th>Party Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["pid"] . "</td>";
                                echo "<td><img src='" . $row["pimg"] . "' alt='" . $row["pname"] . " Symbol'></td>";
                                echo "<td>" . $row["pname"] . "</td>";
                                echo "<td>
                                        <div class='action-buttons'>
                                            <a href='admin_party_disp_edit.php?pid=" . $row['pid'] . "' class='btn'>Edit</a>
                                            <a href='admin_party_display.php?delete=" . $row['pid'] . "' class='btn delete'>Delete</a>
                                        </div>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No parties found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>