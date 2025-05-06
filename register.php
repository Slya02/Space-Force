<?php
require './dashbord/function.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi login dari database
    $cekdb = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");

    //hitung jumlah data
    $hitung= mysqli_num_rows($cekdb);
    if ($hitung>0) {
        $_SESSION['log'] = 'True';
        header('location:./dashbord/index.php');
    }
    else {
        header('location:loginadmin.php');
    }
    }
    if(!isset($_SESSION['login'])){
    }
    else{
        header('location:./dashbord/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register - Space Travel</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div class="imagebg">
            <?php include './content/navbar.php'; ?>
            <main class="register-page">
                <h2 class="register-subheading">
                    <span>07</span> JOIN US TO SPACE
                </h2>
                <form class="register-card" method="POST">
                    <label for="inputEmail">Email</label>
                    <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                    <label for="inputPassword">Password</label>
                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                    <!-- <label for="date">Departure Date</label>
                    <div class="date-input">
                        <span class="calendar-icon">📅</span>
                        <input type="date" id="date" name="date" placeholder="Select a date" />
                    </div> -->
                    <button type="submit" name="login">Log In</button>
                </form>
                <footer>
                    <div class="power-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                            <line x1="12" y1="2" x2="12" y2="12"></line>
                        </svg>
                    </div>
                </footer>
            </main>
        </div>
    </body>
</html>