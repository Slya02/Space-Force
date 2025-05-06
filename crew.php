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
                    <span>03</span> MEET THE CREWS
                </h2>
                <div class="crew-content">
                    <div class="crew-info">
                        <h3 class="crew-role"></h3>
                        <h1 class="crew-name"></h1>
                        <p class="crew-description"></p>
                        <div class="controls">
                            <button id="prev">←</button>
                            <div class="dots">
                                <span class="dot active"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                            </div>
                            <button id="next">→</button>
                        </div>
                    </div>
                    <div class="crew-image">
                        <img src="assets/DSR_Mathius_Portrait.jpg" alt="Benjamin Mathius" />
                    </div>
                </div>
            </main>
        </div>
    </body>
    <script src="script.js"></script>
</html>