<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المنتجات</title>
    <link rel="stylesheet" href="styles.css">
    <!-- إضافة خطوط من Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* تصميم العنوان */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        /* تصميم الزر */
        .add-btn {
            display: block;
            background-color: #ff6b6b;
            color: white;
            padding: 12px 20px;
            text-align: center;
            border-radius: 50px;
            text-decoration: none;
            margin: 20px 0;
            max-width: 200px;
            margin-left: auto;
            margin-right: auto;
            transition: background-color 0.3s ease-in-out;
        }

        .add-btn:hover {
            background-color: #ff4d4d;
        }

        /* تصميم الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff6b6b;
            color: white;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* تصميم الروابط */
        .edit-btn, .delete-btn {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #1dd1a1;
        }

        .edit-btn:hover {
            background-color: #10ac84;
        }

        .delete-btn {
            background-color: #ff6b6b;
        }

        .delete-btn:hover {
            background-color: #ff4d4d;
        }

        /* تحسين التصميم للهواتف */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            table, th, td {
                font-size: 14px;
            }

            .add-btn {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>إدارة المنتجات</h1>

    <a href="add.php" class="add-btn">إضافة منتج جديد</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المنتج</th>
                <th>الوصف</th>
                <th>السعر</th>
                <th>تاريخ الإضافة</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $sql = "SELECT * FROM items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>" . $row['price'] . " ر.س</td>
                        <td>" . $row['created_at'] . "</td>
                        <td>
                            <a href='edit.php?id=" . $row['id'] . "' class='edit-btn'>تعديل</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='delete-btn'>حذف</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>لا توجد منتجات</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
