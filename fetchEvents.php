<?php
include '../config.php';
$sql = "SELECT * FROM events ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
echo json_encode(array_reverse($events));
?>