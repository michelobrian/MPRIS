<?php
include 'db_connect.php'; // Include the database connection file

// Handle search query
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $result = $connection->query("SELECT * FROM land_records WHERE plot_no LIKE '%$search_query%' OR property_owner LIKE '%$search_query%' OR contact_number LIKE '%$search_query%'");
} else {
    $result = $connection->query("SELECT * FROM land_records");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land Records</title>
    <link rel="icon" type="image" href="Images/court of arms.png">
    <link rel="stylesheet" href="css/local.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-left: 0%;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 20px;
        }
        header {
            background-image: url('Images/land_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 9px;
            margin-left: -2%;
            margin-right: -2%;
        }
        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
           <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left: 3%; padding-right: 3%; margin-bottom: 10px;">
                    <a class="navbar-brand" style="padding-left: 2%;"  href="#">MPRIS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="about.php">About <span class="sr-only">(current)</span></a>
                    </li>
                    </li>
                    <li style="padding-right: 5px; padding-left: 400%;">
                    <a href="login.php" class="btn btn-success" style="float:right;">Login</a>
                    </li>
                    <li>
                    <a href="logout.php" class="btn btn-danger" style="float:right;">Logout</a>
                    </li>
                    </div>
                </nav>
                
    <div class="title">
        <h1 style="text-align: left; padding-left: 5%; margin-top: 10px;">Land Records</h1>
    </div>
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a href="export_to_excel_land.php" class="btn btn-success">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to Excel
            </a>
        </div>
        <h2>Land Records</h2>
        <!-- Search Form -->
        <form method="GET" action="" class="search-form">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Plot No, Property Owner, or Contact Number" value="<?php echo htmlspecialchars($search_query); ?>" style="max-width: 300px;">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="land_display.php" class="btn btn-secondary">Reset</a>
        </form>
        <table class="table table-bordered" style="font-size: small;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Plot No</th>
                    <th>Property Owner</th>
                    <th>Contact Number</th>
                    <th>Area</th>
                    <th>Zone</th>
                    <th>Council Documents</th>
                    <th>Ministry Documents</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['plot_no'] . "</td>";
                    echo "<td>" . $row['property_owner'] . "</td>";
                    echo "<td>" . $row['contact_number'] . "</td>"; // Display contact number
                    echo "<td>" . $row['area'] . "</td>";
                    echo "<td>" . $row['zone'] . "</td>";
                    // Display links to council and ministry documents
                    if (!empty($row['council_documents'])) {
                        echo "<td><a href='" . $row['council_documents'] . "' target='_blank'>View Document</a></td>";
                    } else {
                        echo "<td>No Document</td>";
                    }
                    if (!empty($row['ministry_documents'])) {
                        echo "<td><a href='" . $row['ministry_documents'] . "' target='_blank'>View Document</a></td>";
                    } else {
                        echo "<td>No Document</td>";
                    }
                    echo "<td>" . $row['date_created'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="land_entry.php" class="btn btn-primary">Add New Record</a>
    </div>
</body>
</html>