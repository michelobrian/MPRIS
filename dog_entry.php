<?php
include 'db_connect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dog_name = $_POST["dog_name"];
    $breed = $_POST["breed"];
    $age = $_POST["age"];
    $owner_name = $_POST["owner_name"];
    $owner_contact = $_POST["owner_contact"];
    $registration_date = $_POST["registration_date"];

    // Handle file upload
    $target_dir = "uploads/";
    $vaccination_certificate = $target_dir . basename($_FILES["vaccination_certificate"]["name"]);
    $upload_ok = 1;

    // Validate file type
    $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];
    $file_type = strtolower(pathinfo($vaccination_certificate, PATHINFO_EXTENSION));

    if (!in_array($file_type, $allowed_types)) {
        echo "<div class='alert alert-danger'>Only JPG, JPEG, PNG, and PDF files are allowed for uploads.</div>";
        $upload_ok = 0;
    }

    // Attempt to upload file
    if ($upload_ok && move_uploaded_file($_FILES["vaccination_certificate"]["tmp_name"], $vaccination_certificate)) {
        // Insert data into the database
        $sql = "INSERT INTO dogs (dog_name, breed, age, owner_name, owner_contact, registration_date, vaccination_certificate)
                VALUES ('$dog_name', '$breed', '$age', '$owner_name', '$owner_contact', '$registration_date', '$vaccination_certificate')";

        if ($connection->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>New dog registration record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $connection->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error uploading file.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Registration</title>
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
        <h2 style="margin-left: 20%;">Register a Dog</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="dog_name">Dog Name:</label>
                <input type="text" class="form-control" id="dog_name" name="dog_name" required>
            </div>
            <div class="form-group">
                <label for="breed">Breed:</label>
                <input type="text" class="form-control" id="breed" name="breed" required>
            </div>
            <div class="form-group">
                <label for="age">Age (in years):</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="owner_name">Owner Name:</label>
                <input type="text" class="form-control" id="owner_name" name="owner_name" required>
            </div>
            <div class="form-group">
                <label for="owner_contact">Owner Contact:</label>
                <input type="text" class="form-control" id="owner_contact" name="owner_contact" required>
            </div>
            <div class="form-group">
                <label for="registration_date">Registration Date:</label>
                <input type="date" class="form-control" id="registration_date" name="registration_date" required>
            </div>
            <div class="form-group">
                <label for="vaccination_certificate">Vaccination Certificate:</label>
                <input type="file" class="form-control" id="vaccination_certificate" name="vaccination_certificate" required>
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