<?php
$conn = new mysqli("localhost", "root", "", "cs_department");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
