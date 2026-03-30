<?php
// Start session to know which user is sending the event
session_start();

// Include database connection
include '../config.php';

// Get the message sent via AJAX
$message = isset($_POST['message']) ? trim($_POST['message']) : '';
$username = $_SESSION['username'] ?? 'Guest';

// If message is not empty, insert into 'events' table
if ($message != '') {
    $stmt = $conn->prepare("INSERT INTO events (event_type, event_data) VALUES (?, ?)");
    
    // event_type can be generic; here we use 'Message'
    $type = 'Message';
    
    // Combine username with message
    $full_message = "$username: $message";

    $stmt->bind_param("ss", $type, $full_message);
    $stmt->execute();
    $stmt->close();
}

// No output needed because frontend fetches events separately
?>