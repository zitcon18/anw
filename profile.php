<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,Helvetica,sans-serif;
}

body{
    background:#f4f6f9;
}

header{
    background:#0d6efd;
    color:#fff;
    padding:15px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:24px;
    font-weight:bold;
}

nav a{
    color:#fff;
    text-decoration:none;
    margin-left:20px;
}

.container{
    width:900px;
    margin:40px auto;
}

.card{
    background:#fff;
    border-radius:10px;
    padding:30px;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
}

.avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    background:#0d6efd;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:36px;
    margin-bottom:20px;
}

h2{
    color:#333;
}

.info{
    margin-top:20px;
    line-height:2;
    color:#555;
}

.actions{
    margin-top:35px;
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.btn{
    text-decoration:none;
    background:#0d6efd;
    color:#fff;
    padding:12px 20px;
    border-radius:8px;
    transition:.3s;
}

.btn:hover{
    background:#084298;
}

.btn-danger{
    background:#dc3545;
}

.btn-danger:hover{
    background:#b02a37;
}

.notice{
    margin-top:30px;
    padding:15px;
    border-left:5px solid orange;
    background:#fff3cd;
}

</style>

</head>

<body>

<header>

<div class="logo">SecureShop</div>

<nav>
    <a href="index.php">Home</a>
    <a href="logout.php">Logout</a>
</nav>

</header>

<div class="container">

<div class="card">

<div class="avatar">
<?= strtoupper(substr($_SESSION['fullname'],0,1)); ?>
</div>

<h2>Xin chào, <?= htmlspecialchars($_SESSION['fullname']); ?>!</h2>

<div class="info">

<p><strong>Họ và tên:</strong>
<?= htmlspecialchars($user['fullname']); ?></p>

<p><strong>Ngày sinh:</strong>
<?= htmlspecialchars($user['birthdate']); ?></p>

<p><strong>Email:</strong>
<?= htmlspecialchars($user['email']); ?></p>

<p><strong>Tên đăng nhập:</strong>
<?= htmlspecialchars($user['username']); ?></p>

<p><strong>Trạng thái:</strong> Active</p>

</div>
<div class="actions">

<a class="btn" href="leak.php">
Database Leak Demo
</a>

<a class="btn" href="decrypt.php">
Hardcoded Key Demo
</a>

<a class="btn btn-danger" href="logout.php">
Logout
</a>
<a href="security-report.php" class="btn">View Security Report</a>
</div>

<div class="notice">

<b>Demo Security</b><br><br>

Sau khi đăng nhập, bạn có thể:

<ul style="margin-top:10px;margin-left:20px;">
<li>Xem dữ liệu bị rò rỉ trong cơ sở dữ liệu.</li>
<li>Demo Hardcoded Encryption Key.</li>
</ul>

</div>

</div>

</div>

</body>
</html>
