<?php
require 'function.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek admin
    $cekdbadmin = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($cekdbadmin) > 0) {
        $_SESSION['log'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['email'] = $email;
        header('location: ./dashbord/index.php');
        exit;
    }

    // Cek user
    else{
    $cekdbuser = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($cekdbuser) > 0) {
        $_SESSION['log'] = true;
        // $_SESSION['role'] = 'user';
        // $_SESSION['email'] = $email;
        header('location:index.php');
        exit;
    }
}

    // Jika login gagal
    header('location: register.php');
    exit;
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
            <main class="register-page">
                <h2 class="register-subheading">
                    <span>ORBITAL NEXUS</span> | JOIN US TO SPACE
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