<?php
$conn = new mysqli("localhost", "root", "", "project1");
if ($conn->connect_error) die("DB lỗi");

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn->query("INSERT INTO contact(name,email,message)
                  VALUES('$name','$email','$message')");
}

$data = $conn->query("SELECT * FROM contact ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liên hệ</title>
    <link rel="stylesheet" href="css.css">
    <style>

    </style>
</head>

<body>

    <h2>Website giới thiệu</h2>
    <p>Đây là website demo Project 1</p>

    <div class="container">

        <!-- BÊN TRÁI: FORM -->
        <div class="left">
            <h3>Form liên hệ</h3>
            <form method="post">
                <input name="name" placeholder="Tên" required>
                <input name="email" type="email" placeholder="Email" required>
                <textarea name="message" placeholder="Nội dung"></textarea>
                <button name="send">Gửi</button>
            </form>
        </div>

        <!-- BÊN PHẢI: HIỂN THỊ DATA -->
        <div class="right">
            <h3>Dữ liệu vừa gửi</h3>

            <?php while ($row = $data->fetch_assoc()): ?>
            <div class="item">
                <b><?= $row['name'] ?></b> (<?= $row['email'] ?>)
                <p><?= $row['message'] ?></p>
            </div>
            <?php endwhile; ?>

        </div>

    </div>

</body>

</html>