<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Space Travel</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div class="imagebg" style='background-image: url("assets/background-destination-desktop.jpg");'>
            <?php include './content/navbar.php'; ?>
            <main style="padding: 20px 165px; display: block;">
                <h2 class="subheading">
                    <span>02</span> CHOOSE YOUR DESTINATION
                </h2>
                <div class="destination-content">
                    <div class="planet-image">
                        <img src="assets/image-moon.png" alt="Moon" />
                    </div>
                    <div class="planet-info">
                        <ul class="planet-tabs">
                            <li class="active">Moon</li>
                            <li>Venus</li>
                            <li>Mars</li>
                            <li>Europa</li>
                            <li>Titan</li>
                        </ul>
                        <h1 class="planet-name">MOON</h1>
                        <p class="planet-description"> See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites. </p>
                        <hr />
                        <div class="stats">
                            <div>
                                <h3>AVG DISTANCE</h3>
                                <p>384,400 KM</p>
                            </div>
                            <div>
                                <h3>EST. TRAVEL TIME</h3>
                                <p>3 DAYS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="script.js"></script>
    </body>
</html>