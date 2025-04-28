<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Municipal Public Records</title>
            <link rel="icon" type="image" href="Images/court of arms.png">
            <link rel="stylesheet" href="css/local.css">
            <style>
                header {
                    background-image: url('Images/landing1.jpg');
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    min-height: 700px;
                    margin-left: -2%;
                    margin-right: -2%;
                
                }
            </style>
        </head>
        <body>
            <header>
                <nav>
                    <ul>
                        <li><a href="index.html">Records Home</a></li>
                        <li>About</li>
                        <li>Services</li>
                        <li>Payments</li>
                        <li><a href="login.php">LogIn</a></li>
                    </ul>
                </nav>
            <div class="pg_title">
                <h1> Welcome To The Municipal Public Records System</h1>
                <h3>Ministry of Local Government and Rural Development <br></h3>
                <hr>
                <p style="padding-right: 45%;padding-bottom: 8%;padding-top: 5%">
                    The <strong>The Municipal Public Records System (MPRIS)</strong> is the the Municipal's records and archive system that enables the general public to search for public Records
                    for Mongu District. The system allows you to search through recorded <strong>death, births, marriages and pet (dog) registrations </strong>under
                    control of animals.
                </p>

                <div class="options" style="border-radius: 25px; margin-top: 10px; padding-top: 8%;">
                    <h3> SELECT SERVICE</h3>
                    <button onclick="location.href='marriages.html'">Marriage Records</button>
                    <button onclick="location.href='births.html'"> Birth Records</button>
                    <button onclick="location.href='death records.html'">Death Records</button>
                    <button onclick="location.href='dog registration.html'">Dog Registrations</button>
                </div>
            </div>
            </header>
        </body>
    </html>
