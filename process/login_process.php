<?php
session_start();
include("../config/db.php");

$email = trim($_POST['email']);
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    die("Email and password are required.");
}


$stmt = $conn->prepare("SELECT id, password, account_type FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['account_type'] = $user['account_type']; 

        if ($_SESSION['account_type'] == "rider") {
            header("Location: ../rider_page.php");
        } else {
            header("Location: ../contact_page.php");
        }
        exit();

    } else {
        die("Incorrect password.");
    }
} else {
    die("User not found.");
}
?>