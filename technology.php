<?php
require 'cek.php';
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Space Travel</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div class="imagebg" style="background-image: url('assets/background-technology-desktop.jpg');">
            <?php include './content/navbar.php'; ?>
            <div class="tech-wrapper">
                <h2 class="subheading">
                    <span>04</span> SPACE LAUNCH 101
                </h2>
                <div class="tech-body">
                    <div class="tech-nav">
                        <button class="tech-dot active">1</button>
                        <button class="tech-dot">2</button>
                        <button class="tech-dot">3</button>
                        <button class="tech-dot">4</button>
                        <button class="tech-dot">5</button>
                    </div>
                    <div class="tech-content-image">
                        <div class="tech-content fade">
                            <h3 class="tech-subtitle">THE TERMINOLOGY ...</h3>
                            <h1 class="tech-title">LAUNCH VEHICLE</h1>
                            <p class="tech-description">A launch vehicle or carrier rocket is a rocket-propelled vehicle...</p>
                        </div>
                        <div class="tech-image fade">
                            <img src="assets/launch-vehicle.jpg" alt="Launch Vehicle" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="module" src="script.js"></script>
</html>