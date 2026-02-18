<?php
session_start();
include("../config/db.php");

$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$account_type = $_POST['account_type']; 

if (empty($fullname) || empty($email) || empty($password) || empty($account_type)) {
    die("All fields are required.");
}


$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (fullname, email, password, account_type) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullname, $email, $hashed, $account_type);

if ($stmt->execute()) {
    $user_id = $stmt->insert_id;

    if ($account_type == "rider") {
        $st = $conn->prepare("INSERT INTO rider_status (rider_id, last_location, last_ping, ride_active) VALUES (?, 'No location yet', NOW(), 0)");
        $st->bind_param("i", $user_id);
        $st->execute();
    }

    $_SESSION['user_id'] = $user_id;
    $_SESSION['account_type'] = $account_type; 

    if ($account_type == "rider") {
        header("Location: ../rider_page.php");
    } else {
        header("Location: ../contact_page.php");
    }
    exit();
}
?>