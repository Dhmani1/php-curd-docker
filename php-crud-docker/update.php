<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE items SET name='$name', description='$description', price='$price' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php"); // التوجيه إلى صفحة عرض العناصر بعد التعديل
        exit();
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html>
<head>
    <title>تعديل عنصر</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>تعديل عنصر</h2>
    <form method="post" action="update.php?id=<?php echo $id; ?>">
        <label for="name">اسم العنصر:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <label for="description">الوصف:</label>
        <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>
        <label for="price">السعر:</label>
        <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required><br><br>
        <input type="submit" value="تعديل">
    </form>
</body>
</html>

<?php
$conn->close();
?>
