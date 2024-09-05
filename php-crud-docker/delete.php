<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM items WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php"); // التوجيه إلى صفحة عرض العناصر بعد الحذف
    exit();
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
