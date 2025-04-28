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
                    min-height: 900px;
                    margin-left: -2%;
                    margin-right: -2%;
                
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
            <h1> Welcome To The Municipal Public Records System</h1>
            </div>

            <div class="pg_title">
               
                <h3 style="padding-top: 3px;">Your Local Authority at Your Convenience <br></h3>
                <hr>
                <p style="padding-right: 45%;padding-bottom: 3%;padding-top: 3%">
                    The <strong>The Municipal Public Records System (MPRIS)</strong> is the the Municipal's records and archive system that enables the general public to search for public Records
                    for Mongu District. The system allows you to search through recorded <strong>death, births, marriages and pet (dog) registrations </strong>under
                    control of animals.
                </p>
                <hr>
                <div class="options" style="border-radius: 40px; margin-top: 10px; padding-top: 8%;">
                    <h3> SELECT SERVICE</h3>
                    <button class="button-3" role="button" onclick="location.href='marriages.php'">Marriage Records</button>
                    <button class="button-3" role="button" onclick="location.href='births.php'"> Birth Records</button>
                    <button class="button-3" role="button" onclick="location.href='death records.php'">Death Records</button>
                    <button class="button-3" role="button" onclick="location.href='dog registration.php'">Dog Registrations</button>
                    <button class="button-3" role="button" onclick="location.href='land.php'"> Land Records</button>
                    <button class="button-3" role="button" onclick="location.href='fees and charges.php'">Fees and Charges</button>
                </div>
            </div>
            </header>
        </body>

        <footer style="background-color:rgb(6, 0, 0); color: white;  padding: 10px; bottom: 0; width: 100%;">
            <p style="text-align: center;">&copy; 2023 Municipal Public Records System. All rights reserved.</p>
            <p style="padding-left:30%;">Developed by:  Brian Michelo    <a href="https://github.com/michelobrian" target="_blank">GitHub</a></p>
            <p style="padding-left:30%;">Contact:  0977 273121  <br> Email: michelobrian88@gmail.com</p>
    </html>
