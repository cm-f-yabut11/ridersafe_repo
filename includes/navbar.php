<nav class="navbar">
    <div class="container nav-flex">
        <a href="/RIDERSAFE_Project/index.php" class="logo">
            RiderSafe <span>🚴</span>
        </a>

        <div class="menu-btn">☰</div>

        <div class="nav-links">
            <a href="/RIDERSAFE_Project/index.php">Home</a>

            <?php if(isset($_SESSION['user_id'])): ?>
                
                <?php if($_SESSION['account_type'] == "rider"): ?>
                    <a href="/RIDERSAFE_Project/rider_page.php">Rider Console</a>
                    <a href="/RIDERSAFE_Project/button_page.php">Safety Button</a>
                    <a href="/RIDERSAFE_Project/contact_page.php">Monitoring View</a>
                
                <?php else: ?>
                    <a href="/RIDERSAFE_Project/contact_page.php">Dashboard</a>
                <?php endif; ?>

                <a href="/RIDERSAFE_Project/profile.php">Profile</a>
                <a href="/RIDERSAFE_Project/process/logout.php" class="btn btn-primary">Logout</a>

            <?php else: ?>
                <a href="/RIDERSAFE_Project/login.php">Login</a>
                <a href="/RIDERSAFE_Project/register.php" class="btn btn-primary">Get Started</a>
            <?php endif; ?>
        </div>
    </div>
</nav>