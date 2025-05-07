<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "mpris_db";

$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_of_child = $_POST["name_of_child"];
    $date_of_birth = $_POST["date_of_birth"];
    $sex = $_POST["sex"];
    $place_of_birth = $_POST["place_of_birth"];
    $name_of_mother = $_POST["name_of_mother"]; // Corrected variable name
    $name_of_father = $_POST["name_of_father"];
    $birth_certificate_number = $_POST["birth_certificate_number"];
    $date_of_registration = $_POST["date_of_registration"];
    $place_of_registration = $_POST["place_of_registration"];
    $amount_paid = $_POST["amount_paid"];
    $receipt_number = $_POST["receipt_number"];

    // Handle file upload
    $target_dir = "uploads/";
    $birth_certificate_scan = $target_dir . basename($_FILES["birth_certificate_scan"]["name"]);
    $upload_ok = 1;
    $file_type = strtolower(pathinfo($birth_certificate_scan, PATHINFO_EXTENSION));

    // Check if file is a valid image or PDF
    if ($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "pdf") {
        echo "<div class='alert alert-danger'>Only JPG, JPEG, PNG, and PDF files are allowed.</div>";
        $upload_ok = 0;
    }

    // Attempt to upload file
    if ($upload_ok && move_uploaded_file($_FILES["birth_certificate_scan"]["tmp_name"], $birth_certificate_scan)) {
        $sql = "INSERT INTO births (name_of_child, date_of_birth, sex, place_of_birth, name_of_mother, name_of_father, birth_certificate_number, date_of_registration, place_of_registration, amount_paid, receipt_number, birth_certificate_scan)
                VALUES ('$name_of_child', '$date_of_birth', '$sex', '$place_of_birth', '$name_of_mother', '$name_of_father', '$birth_certificate_number', '$date_of_registration', '$place_of_registration', '$amount_paid', '$receipt_number', '$birth_certificate_scan')";

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
    <title>Birth Records Entry</title>
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
        <h2 style="margin-left: 20%;">Enter Birth Records</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name_of_child">Name of Child:</label>
                <input type="text" class="form-control" id="name_of_child" name="name_of_child" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select class="form-control" id="sex" name="sex" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="place_of_birth">Place of Birth:</label>
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
            </div>
            <div class="form-group">
                <label for="name_of_mother">Name of Mother:</label>
                <input type="text" class="form-control" id="name_of_mother" name="name_of_mother" required>
            </div>
            <div class="form-group">
                <label for="name_of_father">Name of Father:</label>
                <input type="text" class="form-control" id="name_of_father" name="name_of_father" required>
            </div>
            <div class="form-group">
                <label for="birth_certificate_number">Birth Certificate Number:</label>
                <input type="text" class="form-control" id="birth_certificate_number" name="birth_certificate_number" required>
            </div>
            <div class="form-group">
                <label for="date_of_registration">Date of Registration:</label>
                <input type="date" class="form-control" id="date_of_registration" name="date_of_registration" required>
            </div>
            <div class="form-group">
                <label for="place_of_registration">Place of Registration:</label>
                <input type="text" class="form-control" id="place_of_registration" name="place_of_registration" required>
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
                <label for="birth_certificate_scan">Birth Certificate Scan:</label>
                <input type="file" class="form-control" id="birth_certificate_scan" name="birth_certificate_scan" required>
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