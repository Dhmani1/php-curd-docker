<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'config.php';

// جلب جميع البيانات من جدول items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض العناصر</title>
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
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* تصميم العنوان */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* تصميم الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #1dd1a1;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #10ac84;
            font-weight: bold;
        }

        a:hover {
            color: #1dd1a1;
        }

        /* تصميم الرسالة في حال عدم وجود عناصر */
        .no-items {
            text-align: center;
            color: #ff6b6b;
            font-size: 18px;
            margin-top: 20px;
        }

        /* تصميم زر إضافة عنصر جديد */
        .add-item {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #1dd1a1;
            color: white;
            text-align: center;
            border-radius: 50px;
            text-decoration: none;
            font-size: 16px;
        }

        .add-item:hover {
            background-color: #10ac84;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>عرض العناصر</h2>

    <!-- زر لإضافة عنصر جديد -->
    <a href="add.php" class="add-item">إضافة عنصر جديد</a>

    <!-- جدول عرض العناصر -->
    <table>
        <tr>
            <th>ID</th>
            <th>اسم العنصر</th>
            <th>الوصف</th>
            <th>السعر</th>
            <th>تعديل</th>
            <th>حذف</th>
        </tr>

        <?php
        // التحقق من وجود عناصر في الجدول
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>تعديل</a></td>";
                echo "<td><a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('هل أنت متأكد من الحذف؟')\">حذف</a></td>";
                echo "</tr>";
            }
        } else {
            // رسالة إذا لم توجد عناصر في الجدول
            echo "<tr><td colspan='6' class='no-items'>لا توجد عناصر</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
