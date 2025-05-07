<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "mpris_db";

$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Handle search query
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $result = $connection->query("SELECT * FROM births WHERE name_of_child LIKE '%$search_query%'");
} else {
    $result = $connection->query("SELECT * FROM births");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birth Records</title>
    <link rel="icon" type="image" href="Images/court of arms.png">
    <link rel="stylesheet" href="css/local.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-left: 8%;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 20px;
        }
        header {
            background-image: url('Images/births_bg.jpg');
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
    <header>
        <nav class="sidebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="payments.php">Payments</a></li>
                <li><a href="login.php">Employee LogIn</a></li>
            </ul>
        </nav>
        <div class="title">
            <h1 style="text-align: left; padding-left: 12%; margin-top: 10px;">Birth Records</h1>
        </div>
    </header>
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a href="export_to_excel_birth.php" class="btn btn-success">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to Excel
            </a>
        </div>
        <h2>Birth Records</h2>
        <!-- Search Form -->
        <form method="GET" action="" class="search-form">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Name of Child" value="<?php echo htmlspecialchars($search_query); ?>" style="max-width: 300px;">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="birth_display.php" class="btn btn-secondary">Reset</a>
        </form>
        <table class="table table-bordered" style="font-size: small;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name of Child</th>
                    <th>Date of Birth</th>
                    <th>Sex</th>
                    <th>Place of Birth</th>
                    <th>Name of Mother</th>
                    <th>Name of Father</th>
                    <th>Birth Certificate Number</th>
                    <th>Date of Registration</th>
                    <th>Place of Registration</th>
                    <th>Amount Paid</th>
                    <th>Receipt Number</th>
                    <th>Birth Certificate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name_of_child'] . "</td>";
                    echo "<td>" . $row['date_of_birth'] . "</td>";
                    echo "<td>" . $row['sex'] . "</td>";
                    echo "<td>" . $row['place_of_birth'] . "</td>";
                    echo "<td>" . $row['name_of_mother'] . "</td>";
                    echo "<td>" . $row['name_of_father'] . "</td>";
                    echo "<td>" . $row['birth_certificate_number'] . "</td>";
                    echo "<td>" . $row['date_of_registration'] . "</td>";
                    echo "<td>" . $row['place_of_registration'] . "</td>";
                    echo "<td>" . $row['amount_paid'] . "</td>";
                    echo "<td>" . $row['receipt_number'] . "</td>";
                    // Display the birth certificate link
                    if (!empty($row['birth_certificate_scan'])) {
                        echo "<td><a href='" . $row['birth_certificate_scan'] . "' target='_blank'>View Document</a></td>";
                    } else {
                        echo "<td>No Document</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="birth_entry.php" class="btn btn-primary">Add New Record</a>
    </div>
    
</body>
</html>