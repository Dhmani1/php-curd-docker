<<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO items (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php"); // التوجيه إلى صفحة عرض العناصر بعد الإضافة
        exit();
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>إضافة عنصر</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>إضافة عنصر</h2>
    <form method="post" action="create.php">
        <label for="name">اسم العنصر:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="description">الوصف:</label>
        <textarea id="description" name="description"></textarea><br><br>
        <label for="price">السعر:</label>
        <input type="text" id="price" name="price" required><br><br>
        <input type="submit" value="إضافة">
    </form>
</body>
</html>
