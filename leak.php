<?php
include "db.php";
session_start();

// Chỉ cho người đã đăng nhập xem
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT username, password FROM users");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <h2 class="leak-title">Dữ liệu bị rò rỉ</h2>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container leak-warning">
    <h2>Dữ liệu người dùng bị rò rỉ</h2>

    <p class="leak-text">
        Đây là ví dụ về hậu quả của việc lưu mật khẩu không an toàn
        (plaintext) trong cơ sở dữ liệu.
    </p>

    <table border="1" cellpadding="10">
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>

    <a href="profile.php">Quay lại hồ sơ</a>
</div>

</body>
</html>
