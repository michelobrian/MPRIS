<?php
include 'db_connect.php'; // Include the database connection file

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Show welcome message if session started
$user_id = $_SESSION['user_id'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : $user_id; 
echo "<div class='alert alert-info'>You are logged in as $username</div>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plot_no = $_POST["plot_no"];
    $property_owner = $_POST["property_owner"];
    $contact_number = $_POST["contact_number"]; // New field
    $area = $_POST["area"];
    $zone = $_POST["zone"];

    // Handle file uploads
    $target_dir = "uploads/";
    $council_documents = $target_dir . basename($_FILES["council_documents"]["name"]);
    $ministry_documents = $target_dir . basename($_FILES["ministry_documents"]["name"]);
    $upload_ok = 1;

    // Validate file types
    $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
    $council_file_type = strtolower(pathinfo($council_documents, PATHINFO_EXTENSION));
    $ministry_file_type = strtolower(pathinfo($ministry_documents, PATHINFO_EXTENSION));

    if (!in_array($council_file_type, $allowed_types) || !in_array($ministry_file_type, $allowed_types)) {
        echo "<div class='alert alert-danger'>Only JPG, JPEG, PNG, and PDF files are allowed for uploads.</div>";
        $upload_ok = 0;
    }

    // Attempt to upload files
    if ($upload_ok && move_uploaded_file($_FILES["council_documents"]["tmp_name"], $council_documents) &&
        move_uploaded_file($_FILES["ministry_documents"]["tmp_name"], $ministry_documents)) {

        // Insert data into the database
        $sql = "INSERT INTO land_records (plot_no, property_owner, contact_number, area, zone, council_documents, ministry_documents)
                VALUES ('$plot_no', '$property_owner', '$contact_number', '$area', '$zone', '$council_documents', '$ministry_documents')";

        if ($connection->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>New land record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $connection->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error uploading files.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land Records Entry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-left: 8%;
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
<body style="background-color:rgb(234, 234, 234);">
    <div class="container">
        <h2 style="margin-left: 20%;">Enter Land Records</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="plot_no">Plot No:</label>
                <input type="text" class="form-control" id="plot_no" name="plot_no" required>
            </div>
            <div class="form-group">
                <label for="property_owner">Property Owner:</label>
                <input type="text" class="form-control" id="property_owner" name="property_owner" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label> <!-- New field -->
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
            </div>
            <div class="form-group">
                <label for="area">Area:</label>
                <input type="text" class="form-control" id="area" name="area" required>
            </div>
            <div class="form-group">
                <label for="zone">Zone:</label>
                <input type="text" class="form-control" id="zone" name="zone" required>
            </div>
            <div class="form-group">
                <label for="council_documents">Upload Council Documents:</label>
                <input type="file" class="form-control" id="council_documents" name="council_documents" required>
            </div>
            <div class="form-group">
                <label for="ministry_documents">Upload Ministry Documents:</label>
                <input type="file" class="form-control" id="ministry_documents" name="ministry_documents" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left: 20%;">Submit</button>
        </form>
        <div><button class="btn btn-primary" role="button" onclick="location.href='index.php'" style="margin-bottom: 20px;">Back Home</button></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>