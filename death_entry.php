<?php
include 'db_connect.php'; // Include the database connection file

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_of_deceased = $_POST["name_of_deceased"];
    $name_of_informant = $_POST["name_of_informant"];
    $sex = $_POST["sex"];
    $age_of_deceased = $_POST["age_of_deceased"];
    $date_of_death = $_POST["date_of_death"];
    $cause_of_death = $_POST["cause_of_death"];
    $place_of_death = $_POST["place_of_death"];
    $burial_place = $_POST["burial_place"];
    $amount_paid = $_POST["amount_paid"];
    $receipt_number = $_POST["receipt_number"];

    // Handle file upload
    $target_dir = "uploads/";
    $death_certificate_scan = $target_dir . basename($_FILES["death_certificate_scan"]["name"]);
    $upload_ok = 1;
    $file_type = strtolower(pathinfo($death_certificate_scan, PATHINFO_EXTENSION));

    // Check if file is a valid image or PDF
    if ($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "pdf") {
        echo "<div class='alert alert-danger'>Only JPG, JPEG, PNG, and PDF files are allowed.</div>";
        $upload_ok = 0;
    }

    // Attempt to upload file
    if ($upload_ok && move_uploaded_file($_FILES["death_certificate_scan"]["tmp_name"], $death_certificate_scan)) {
        $sql = "INSERT INTO deaths (name_of_deceased, name_of_informant, sex, age_of_deceased, date_of_death, cause_of_death, place_of_death, burial_place, amount_paid, receipt_number, death_certificate_scan)
                VALUES ('$name_of_deceased', '$name_of_informant', '$sex', '$age_of_deceased', '$date_of_death', '$cause_of_death', '$place_of_death', '$burial_place', '$amount_paid', '$receipt_number', '$death_certificate_scan')";

        if ($connection->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>New record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $connection->error . "</div>";
        }
    } else {
        if ($upload_ok) {
            echo "<div class='alert alert-danger'>Error uploading file.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death Records Entry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-left: 0%;
            background-image: url('images/about.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
        }
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
            margin-left: 20%;
        }
        .form-control {
            max-width: 600px;
        }
        .btn {
            margin-top: 10px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
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
                <a class="nav-link" href="about.php"><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php
            $user_id = $_SESSION['user_id'];
            $username = isset($_SESSION['username']) ? $_SESSION['username'] : $user_id;
            echo "<span class='navbar-text mr-3'>Logged in as <strong>$username</strong></span>";
        ?>
        <a href="logout.php" class="btn btn-danger ml-2" style="float:right;">Logout</a>
    </div>
</nav>
</header>

<body>
    <div class="container">
        <h2 style="margin-left: 20%;">Enter Death Records</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name_of_deceased">Name of Deceased:</label>
                <input type="text" class="form-control" id="name_of_deceased" name="name_of_deceased" required>
            </div>
            <div class="form-group">
                <label for="name_of_informant">Name of Informant:</label>
                <input type="text" class="form-control" id="name_of_informant" name="name_of_informant" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select class="form-control" id="sex" name="sex" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age_of_deceased">Age of Deceased:</label>
                <input type="number" class="form-control" id="age_of_deceased" name="age_of_deceased" required>
            </div>
            <div class="form-group">
                <label for="date_of_death">Date of Death:</label>
                <input type="date" class="form-control" id="date_of_death" name="date_of_death" required>
            </div>
            <div class="form-group">
                <label for="cause_of_death">Cause of Death:</label>
                <input type="text" class="form-control" id="cause_of_death" name="cause_of_death" required>
            </div>
            <div class="form-group">
                <label for="place_of_death">Place of Death:</label>
                <input type="text" class="form-control" id="place_of_death" name="place_of_death" required>
            </div>
            <div class="form-group">
                <label for="burial_place">Burial Place:</label>
                <input type="text" class="form-control" id="burial_place" name="burial_place" required>
            </div>
            <div class="form-group">
                <label for="amount_paid">Amount Paid:</label>
                <input type="number" step="0.01" class="form-control" id="amount_paid" name="amount_paid" required>
            </div>
            <div class="form-group">
                <label for="receipt_number">Receipt Number:</label>
                <input type="text" class="form-control" id="receipt_number" name="receipt_number" required>
            </div>
            <div class="form-group">
                <label for="death_certificate_scan">Death Certificate Scan:</label>
                <input type="file" class="form-control" id="death_certificate_scan" name="death_certificate_scan" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left: 20%;">Submit</button>
        </form>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>