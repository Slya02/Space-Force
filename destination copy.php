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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                            <div>
                                <h3>COST</h3>
                                <p>3 DAYS</p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$id_histori;?>">
                                            Edit
                        </button>
                    </div>
                </div>
            </main>
        </div>
        <script type="module">
            import { initPage } from './script.js';
 
            initPage({
            dataUrl: './data/planet_data.json',
            defaultItem: 'Moon',
            order: ['Moon', 'Venus', 'Mars', 'Europa', 'Titan']
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>