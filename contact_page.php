<!DOCTYPE html>
<html lang="en">
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main class="container dashboard">
    
    <div class="profile-box">
        <div class="info">
            <h2>Juan Dela Cruz</h2>
            <p>Vehicle: <strong>Yamaha NMAX (ABC-1234)</strong></p>
        </div>
        <div class="info" style="text-align: right;">
            <p>Current Status:</p>
            <span class="status-badge safe" id="statusBadge">SAFE</span>
        </div>
    </div>

    <div class="dash-grid">
        
        <div class="dash-card">
            <div class="icon">👤</div>
            <h3>Rider Information</h3>
            <p style="margin-top:10px;"><strong>Phone:</strong> 09XX-XXX-XXXX</p>
            <p><strong>Emergency Contact:</strong> Maria Dela Cruz</p>
            <div class="decor-line" style="margin: 20px 0 10px 0;"></div>
            <p class="button-note">Verified RideSafe Member</p>
        </div>

        <div class="dash-card">
            <div class="icon">⏱️</div>
            <h3>Safety Check</h3>
            <p style="margin-top:10px;"><strong>Last Response:</strong></p>
            <p id="lastPing">February 5, 2026 – 3:15 PM</p>
            <div class="map-placeholder">
                System checks rider every 30 minutes. Next check in 12 mins.
            </div>
        </div>

        <div class="dash-card">
            <div class="icon">🚨</div>
            <h3>Emergency Actions</h3>
            <p style="margin-bottom: 15px;">Immediate actions for the contact person:</p>
            
            <a href="tel:09123456789" class="btn btn-secondary full" style="margin-bottom: 10px;">Call Rider</a>
            <a href="sms:09123456789" class="btn btn-primary full" style="margin-bottom: 10px;">Send SMS</a>
            <button class="btn full" style="background: #111827; color: white;">View Last Location</button>
        </div>

    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script src="contact-dashboard.js"></script>
</body>
</html>