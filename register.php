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
                <form class="register-card">
                    <label for="destination">Destination</label>
                    <select id="destination" name="destination">
                        <option value="moon">Moon</option>
                        <option value="venus">Venus</option>
                        <option value="mars">Mars</option>
                        <option value="europa">Europa</option>
                        <option value="titan">Titan</option>
                    </select>
                    <label for="mission">Mission</label>
                    <select id="mission" name="mission">
                        <option value="exploration">Exploration</option>
                        <option value="travel">Travel</option>
                        <option value="mining">Mining</option>
                        <option value="colonization">Colonization</option>
                    </select>
                    <label for="date">Departure Date</label>
                    <div class="date-input">
                        <span class="calendar-icon">📅</span>
                        <input type="date" id="date" name="date" placeholder="Select a date" />
                    </div>
                    <button type="submit">Register</button>
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