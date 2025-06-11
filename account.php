<?php
require 'cek.php';
require 'function.php';
?>

<!-- Lengkapin dong bang ambil data usernya -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Space Travel</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div class="imagebg" style="background-image: url('assets/background-crew-desktop.jpg');">
            <?php include './content/navbar.php'; ?>
            <main style="padding: 20px 165px; display: block;">
                <h2 class="subheading">
                    ABOUT YOUR ACCOUNT
                </h2>
                <div class="crew-content">
                    <div class="crew-info">
                        <h3 class="crew-role"></h3>
                        <h1 class="crew-name"></h1>
                        <p class="crew-description"></p>
                    </div>
                    <div class="crew-image">
                        <img src="assets/profile.jpg" alt="Your Profile Picture" />
                    </div>
                </div>
            </main>
        </div>
    </body>
    <script type="module" src="script.js"></script>
</html>