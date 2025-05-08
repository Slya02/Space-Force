<header>
    <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="24" fill="white" />
            <path d="M24 0C24 0 24 24 0 24C23.5776 24.1714 24 48 24 48C24 48 24 24 48 24C24 24 24 0 24 0Z" fill="#0B0D17" />
        </svg>
    </div>
    <?php $current_page = basename($_SERVER['SCRIPT_NAME']); ?>
    <nav>
        <ul class="main-nav">
            <li class="<?= ($current_page == 'index.php') ? 'active' : ''; ?>">
                <a href="index.php">
                    <span>01</span> 
                    HOME 
                </a>
            </li>
            <li class="<?= ($current_page == 'destination.php') ? 'active' : ''; ?>">
                <a href="destination.php">
                    <span>02</span> 
                    DESTINATION 
                </a>
            </li>
            <li class="<?= ($current_page == 'crew.php') ? 'active' : ''; ?>">
                <a href="crew.php">
                    <span>03</span> 
                    CREW 
                </a>
            </li>
            <li class="<?= ($current_page == 'technology.php') ? 'active' : ''; ?>">
                <a href="technology.php">
                    <span>04</span> 
                    TECHNOLOGY 
                </a>
            </li>
            <li class="<?= ($current_page == 'mission.php') ? 'active' : ''; ?>">
                <a href="mission.php">
                    <span>05</span> 
                    MISSION
                </a>
            </li>
            <li class="<?= ($current_page == 'review.php') ? 'active' : ''; ?>">
                <a href="review.php">
                    <span>06</span>
                     REVIEW
                </a>
            </li>
            <li class="<?= ($current_page == 'register.php') ? 'active' : ''; ?>">
                <a href="register.php">
                    <span>07</span> 
                    REGISTER 
                </a>
            </li>
        </ul>
    </nav>
</header>