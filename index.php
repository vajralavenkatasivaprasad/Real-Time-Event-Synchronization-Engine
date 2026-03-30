
<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <a href="logout.php">Logout</a>

    <div id="eventContainer">
        <ul id="eventList"></ul>
    </div>

    <div id="inputContainer">
        <input type="text" id="eventInput" placeholder="Enter event message">
        <button onclick="sendEvent()">Send Event</button>
    </div>

    <script>
        const userId = <?php echo $user_id; ?>;
        const username = "<?php echo $username; ?>";
    </script>
    <script src="js/main.js"></script>
</body>
</html>