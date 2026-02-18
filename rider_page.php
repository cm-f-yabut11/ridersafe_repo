<?php
require_once 'config/db.php';
session_start();

$rider_name = "Juan Dela Cruz"; 
$vehicle = "Yamaha NMAX (ABC-1234)";
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<body>
<main class="container dashboard">
    
    <div class="profile-box">
        <div class="info">
            <span class="mode-label">RIDER MODE</span>
            <h2>Welcome, <?php echo $rider_name; ?></h2>
            <p>Active Vehicle: <strong><?php echo $vehicle; ?></strong></p>
        </div>
        <div class="info" style="text-align: right;">
            <p>Safety Status:</p>
            <span class="status-badge safe" id="statusBadge">READY TO RIDE</span>
        </div>
    </div>

    <div class="dash-grid">
        
        <div class="dash-card emergency-card">
            <div class="icon">🚨</div>
            <h3>Emergency Alert</h3>
            <p>Triggering this will immediately notify all 3 of your trusted contacts with your current GPS location.</p>
            <button class="btn btn-sos full" onclick="triggerSOS()">ACTIVATE SOS</button>
            <p class="button-note">Press only in real emergencies</p>
        </div>

        <div class="dash-card">
            <div class="icon">🏍️</div>
            <h3>Trip Controller</h3>
            <p>Start your trip to begin automated safety check-ins every 30 minutes.</p>
            <div class="decor-line" style="margin: 15px 0;"></div>
            <button class="btn btn-primary full" id="tripBtn">START TRIP</button>
            <div class="map-placeholder">
                No active trip. Contacts are not being tracked.
            </div>
        </div>

        <div class="dash-card">
            <div class="icon">👥</div>
            <h3>Trusted Contacts</h3>
            <p>Manage who sees your status.</p>
            <div class="mini-contact-list">
                <div class="mini-item">
                    <span>Maria Dela Cruz</span>
                    <span class="relation">Wife</span>
                </div>
                <div class="mini-item">
                    <span>Ricardo Santos</span>
                    <span class="relation">Brother</span>
                </div>
            </div>
            <a href="trusted-contacts.php" class="btn btn-secondary full" style="margin-top: 15px;">Manage All Contacts</a>
        </div>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script>
    function triggerSOS() {
        if(confirm("SEND SOS ALERT NOW? This will notify your emergency contacts.")) {
            alert("SOS Broadcasted! Stay where you are.");
        }
    }

    let isTripActive = false;
    document.getElementById('tripBtn').onclick = function() {
        isTripActive = !isTripActive;
        this.innerText = isTripActive ? "END TRIP" : "START TRIP";
        this.style.background = isTripActive ? "#1f2937" : "#3b82f6";
        document.getElementById('statusBadge').innerText = isTripActive ? "ON TRIP" : "READY TO RIDE";
        document.getElementById('statusBadge').className = isTripActive ? "status-badge active-trip" : "status-badge safe";
    };
</script>
</body>
</html>