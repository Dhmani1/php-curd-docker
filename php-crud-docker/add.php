<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $created_at = date("Y-m-d H:i:s"); // تحديد الوقت الحالي

    // تحضير الاستعلام
    $sql = "INSERT INTO items (name, description, price, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $name, $description, $price, $created_at);

    if ($stmt->execute()) {
        echo "تمت إضافة العنصر بنجاح.";
    } else {
        echo "خطأ: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة منتج</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* التصميم الأساسي للصفحة */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        /* تصميم الحاوية الرئيسية */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* تصميم العنوان */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* تصميم النموذج */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: 500;
        }

        input[type="text"], input[type="number"], textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        /* تصميم زر الإرسال */
        button {
            background-color: #1dd1a1;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #10ac84;
        }

        /* تصميم الرسالة الخطأ */
        .error {
            color: red;
            margin-bottom: 20px;
            text-align: center;
        }

        /* تصميم الرابط للعودة */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ff6b6b;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>إضافة منتج جديد</h1>

    <!-- عرض رسالة الخطأ إن وجدت -->
    <?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">اسم المنتج <span style="color: red;">*</span></label>
        <input type="text" name="name" id="name" required>

        <label for="description">الوصف</label>
        <textarea name="description" id="description" rows="4"></textarea>

        <label for="price">السعر (ر.س) <span style="color: red;">*</span></label>
        <input type="number" name="price" id="price" step="0.01" required>

        <button type="submit">إضافة المنتج</button>
    </form>

    <a href="index.php" class="back-link">العودة إلى قائمة المنتجات</a>
</div>

</body>
</html>
