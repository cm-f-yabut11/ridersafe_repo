<?php
session_start();
include("config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Fixed redirect
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT fullname, email, account_type, created_at FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>

<section class="dashboard">
    <div class="container">
        <h1 class="dash-title">My Profile</h1>
        <div class="dash-grid">
            <div class="dash-card">
                <h3>Account Information</h3>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['fullname']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Role:</strong> <?php echo strtoupper(htmlspecialchars($user['account_type'])); ?></p>
            </div>

            <div class="dash-card">
                <h3>Quick Links</h3>
                <?php if($user['account_type'] == "rider"): ?>
                    <a href="button_page.php" class="btn btn-secondary full">Go to Safety Button</a>
                <?php else: ?>
                    <a href="contact_page.php" class="btn btn-secondary full">Go to Contact Dashboard</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>