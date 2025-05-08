<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Review Page</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="imagebg" style="background-image: url('assets/background-home-desktop.jpg');">
    <?php include './content/navbar.php'; ?>
    <main style="padding: 20px 165px; display: block;">
      <h2 class="subheading">
        <span>06</span> HEAR WHAT THEY SAY
      </h2>
      <div class="review-content">
        <div class="review-image">
            <img id="review-img" src="assets/profile.jpg" alt="Reviewer Image"/>
        </div>
        <div class="review-info">
            <h3 class="review-rating"></h3>
            <h1 class="review-name"></h1>
            <p class="review-text"></p>
            <div class="controls">
                <button id="review-prev">←</button>
                <div class="dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <button id="review-next">→</button>
            </div>
      </div>
    </main>
  </div>
  <script type="module" src="script.js"></script>
</body>
</html>
