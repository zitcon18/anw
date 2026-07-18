<?php
include "db.php";
session_start();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users
            WHERE username= ?
            AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

if ($result->num_rows == 1)
{
    $user = $result->fetch_assoc();

    $_SESSION['user'] = $user;

    header("Location: profile.php");
    exit();
}
    else
    {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">

    <h1>Đăng nhập hệ thống</h1>

    <p>
        Nhập thông tin tài khoản để truy cập trang hồ sơ người dùng.
    </p>

    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">

        <input
            type="text"
            name="username"
            placeholder="Tên đăng nhập"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Mật khẩu"
            required
        >

        <input
            type="submit"
            name="login"
            value="Đăng nhập"
        >

    </form>

    <br>

    <a href="register.php" class="btn">
        Đăng ký tài khoản
    </a>

    <a href="index.php" class="btn">
        Trang chủ
    </a>

</div>

</body>
</html>
