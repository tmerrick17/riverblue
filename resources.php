<!DOCTYPE html>
<!-- Name: Trevor Merrick
     Date: 11/30/2020
     File Name: view_ev_info.php -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riverblue Electric Dealership: Resources</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
        <!-- Header -->
        <header>
            <!-- Header -->
            <a href="index.html">
                <img src="images/other_images/electric-car.svg" alt="icon of car with electric plug">
            </a>
            <h1>Riverblue Electric</h1>
        </header>
        <!-- Nav Bar -->
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="view_ev_info.php">Resources</a></li>
                <li><a href="#">Locations</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        
        <!-- Main content -->
        <main class="resources-content">
          <h2>Current Electric Vehicles on the Market Today</h2>
            <div class="ev-table-wrapper">
              <?php
              $servername = "localhost";
              $username = "ev_user";
              $password = "3v2020green";
              $dbname = "mb7257ml_ev_db";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } 

              $sql = "SELECT * FROM ev_info";
              $result = $conn->query($sql);
        
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<section class='title-image'>
                          
                          <h3>Make and Model: " .$row["brand"]. " " .$row["model"]. " " .$row["year"]. "</h3>
                            <ul>
                              <li>Year: " .$row["year"]. "</li>
                              <li>Base Price: $" .number_format($row["base_price"]). "</li>
                              <li>Battery Size: " .$row["battery_size"]. "</li> 
                              <li>EPA EV Range: " .$row["epa_ev_range"]. "</li>
                              <li>0 to 60: " .$row["mph_0_to_60"]. "</li>
                            </ul>
                          
                          <img src='images/ev_images/" .$row["ev_photo"]. " ' alt='ev image'>
                          
                      </section>
                      <br>";
                }
              } else {
                echo "0 results";
              }
              $conn->close();
              ?>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div>
                <a href="https://www.facebook.com" target="_blank">
                    <img class="social-logo" src="images/social_media_icons/facebook-logo.svg" alt="Facebook logo">
                </a>
                <a href="https://twitter.com" target="_blank">
                    <img class="social-logo" src="images/social_media_icons/twitter-logo.svg" alt="Twitter logo">
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <img class="social-logo" src="images/social_media_icons/instagram-logo.svg" alt="Instagram logo">
                </a>
            </div>
            <p class="copyright-info">Copyright © 2016 - 2020 Riverblue Electric Dealership, LLC</p>
            <p class="learn">Riverblue Electric is a fictitious brand created by Trevor Merrick solely for the purpose of learning. All products and people associated with Riverblue Electric are fictitious.</p>
            <div class="logo-designer">
                <p><small>Main icon made by <a href="https://www.flaticon.com/authors/freepik" title="freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></small></p>
                <p><small>Electric icon made by <a href="https://www.flaticon.com/authors/phatplus" title="phatplus">phatplus</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></small></p>
            </div>
            
        </footer>
    </div>

</body>
</html>