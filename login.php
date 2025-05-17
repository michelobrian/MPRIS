<?php
session_start();
include "db_connect.php"; // This must connection to your MySQL database and set $connection

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $connection->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Query the users table for the submitted username
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = $connection->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify the submitted password against the hashed password in the database
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Maintenance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/login_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
        }
    </style>
</head>
<header>
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
                    </div>
                </nav>
</header>
<body class="bg-light">
    <div class="container mt-5" >
        <div class="row justify-content-center" >
            <div class="col-md-5">
                <div class="card shadow p-4">
                    <h3 class="mb-4 text-center">MPRIS Employees LogIn</h3>
                    <?php if ($error): ?>
                        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-sm" style="max-width: 200px;">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>