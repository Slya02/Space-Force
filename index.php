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
        <div class="imagebg">
            <?php include './content/navbar.php'; ?>
            <main>
                <div class="hero-content">
                    <div class="text-content">
                        <h2>WANNA TRAVEL TO ISEKAI</h2>
                        <h1>SPACE?</h1>
                        <p> When you want to go to space, <br /> you might as well bring back something worth the journey. <br /> Sit down and buckle up for a new experience! </p>
                    </div>
                    <div class="explore-button">
                        <button>
                            <a href="destination.php">EXPLORE</a>
                        </button>
                    </div>
                </div>
            </main>
            <footer>
                <div class="power-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                        <line x1="12" y1="2" x2="12" y2="12"></line>
                    </svg>
                </div>
            </footer>
        </div>
    </body>
</html>