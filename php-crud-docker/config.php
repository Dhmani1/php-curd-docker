<?php
$servername = "db";
$username = "myuser";
$password = "userpassword";
$dbname = "mydatabase";

$conn = null;
$max_retries = 10;
$retry_count = 0;

while ($retry_count < $max_retries) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        $retry_count++;
        sleep(2); // الانتظار 2 ثانية قبل المحاولة مرة أخرى
    } else {
        break;
    }
}

if ($conn->connect_error) {
    die("Connection failed after multiple attempts: " . $conn->connect_error);
}
?>
