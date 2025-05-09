<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Municipal Public Records</title>
            <link rel="icon" type="image" href="Images/court of arms.png">
            <link rel="stylesheet" href="css/local.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                header {
                    background-image: url('images/bg_main.jpg');
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
                    <li class="nav-item">
                    <a class="nav-link" href="https://github.com/michelobrian/MPRIS" target="blank">GitHub</a>
                    </li>
                    </div>
                </nav>

                <div class="title">
                <h1> Welcome To The Municipal Public Records System</h1>
                </div>

                <div class="pg_title">
            
                <h3 style="padding-top: 15px; font-weight: 900; color: white;">Your Local Authority at Your Convenience <br></h3>
                <hr>
                <p style="font-weight: 700; text-align: center; color: white; text-shadow: 2px;">Access Public Records, Municipal Archives and Services Online</p>
                <p> </p>
                <hr>
                <div class="options" style="border-radius: 40px; margin-top: 15%; padding-top: 3%; padding-bottom: 5%;">
                    <h3 style="color: white;"> SELECT SERVICE</h3>
                    <button class="button-3" role="button" onclick="location.href='marriage_display.php'">Marriage Records</button>
                    <button class="button-3" role="button" onclick="location.href='birth_display.php'"> Birth Records</button>
                    <button class="button-3" role="button" onclick="location.href='death_display.php'">Death Records</button>
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
