<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch statistics
$births = $connection->query("SELECT COUNT(*) as count FROM births")->fetch_assoc()['count'];
$deaths = $connection->query("SELECT COUNT(*) as count FROM deaths")->fetch_assoc()['count'];
$marriages = $connection->query("SELECT COUNT(*) as count FROM marriages")->fetch_assoc()['count'];
$dogs = $connection->query("SELECT COUNT(*) as count FROM dogs")->fetch_assoc()['count'];
$lands = $connection->query("SELECT COUNT(*) as count FROM land_records")->fetch_assoc()['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - MPRIS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        .stat-card {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 30px 20px;
            margin: 20px 0;
            text-align: center;
            background: #fff;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .entry-btn {
            margin-top: 10px;
        }
        body {
            background-image: url('images/dash_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
            max-height: 900px;
        }
        .dashboard-title {
            margin-top: 30px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
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
                    </li>
                    <li style="padding-right: 5px; padding-left: 400%;">
                    <a href="logout.php" class="btn btn-danger" style="float:right;">Logout</a>
                    </li>
                    </div>
                </nav>
    <?php
    $user_id = $_SESSION['user_id'];
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : $user_id; 
    echo "<div class='alert alert-info'>You are logged in as $username</div>";
    ?>
    <div class="container">
        <h2 class="dashboard-title" style="color: white;">Dashboard - Public Records Statistics</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="stat-card">
                    <div>Birth Records</div>
                    <div class="stat-number"><?php echo $births; ?></div>
                    <a href="birth_entry.php" class="btn btn-primary entry-btn">Add Birth Record</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div>Death Records</div>
                    <div class="stat-number"><?php echo $deaths; ?></div>
                    <a href="death_entry.php" class="btn btn-primary entry-btn">Add Death Record</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div>Marriage Records</div>
                    <div class="stat-number"><?php echo $marriages; ?></div>
                    <a href="marriage_entry.php" class="btn btn-primary entry-btn">Add Marriage Record</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div>Dog Registrations</div>
                    <div class="stat-number"><?php echo $dogs; ?></div>
                    <a href="dog_entry.php" class="btn btn-primary entry-btn">Add Dog Registration</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div>Land Records</div>
                    <div class="stat-number"><?php echo $lands; ?></div>
                    <a href="land_entry.php" class="btn btn-primary entry-btn">Add Land Record</a>
                </div>
            </div>
        </div>
        <div class="text-center" style="margin-top:30px; margin-bottom: 5%;">
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>