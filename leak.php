<?php
include "db.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM users ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Database Leak Demo</title>

<link rel="stylesheet" href="assets/style.css">

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f6f9;
}

.container{
    width:95%;
    max-width:1400px;
    margin:40px auto;
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
    overflow-x:auto;
}
h1{
    color:#dc3545;
    text-align:center;
}

.subtitle{
    text-align:center;
    color:#555;
    margin-bottom:30px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#dc3545;
    color:white;
    padding:12px;
}

table td{
    border:1px solid #ddd;
    padding:10px;
}

table tr:nth-child(even){
    background:#f8f8f8;
}

.status-safe{
    color:green;
    font-weight:bold;
}

.status-danger{
    color:red;
    font-weight:bold;
}

.warning{
    margin-top:30px;
    background:#fff3cd;
    border-left:6px solid orange;
    padding:20px;
}

.warning h3{
    margin-bottom:10px;
}

.warning ul{
    margin-left:20px;
    line-height:1.8;
}

.footer{
    margin-top:30px;
    text-align:center;
}

.btn{
    display:inline-block;
    padding:10px 20px;
    background:#0d6efd;
    color:white;
    text-decoration:none;
    border-radius:6px;
}

.btn:hover{
    background:#084298;
}

</style>

</head>

<body>

<div class="container">

<h1>⚠ Database Leak Demo</h1>

<p class="subtitle">
Mô phỏng tình huống cơ sở dữ liệu bị đánh cắp.
</p>

<p>
<strong>Tổng số tài khoản:</strong>
<?= $result->num_rows ?>
</p>

<table>

<tr>

<th>ID</th>

<th>Họ tên</th>

<th>Ngày sinh</th>

<th>Email</th>

<th>Username</th>

<th>Password</th>

<th>Algorithm</th>

<th>Risk</th>

</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<?php

$isBcrypt = str_starts_with($row['password'], '$2y$');

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['fullname']); ?></td>

<td><?= htmlspecialchars($row['birthdate']); ?></td>

<td><?= htmlspecialchars($row['email']); ?></td>

<td><?= htmlspecialchars($row['username']); ?></td>

<td style="font-size:13px;">
<?= htmlspecialchars($row['password']); ?>
</td>

<td>

<?php

if($isBcrypt){

    echo "<span class='status-safe'>bcrypt</span>";

}else{

    echo "<span class='status-danger'>MD5</span>";

}

?>

</td>

<td>

<?php

if($isBcrypt){

    echo "<span class='status-safe'>Low</span>";

}else{

    echo "<span class='status-danger'>High</span>";

}

?>

</td>

</tr>

<?php } ?>

</table>

<div class="warning">

<h3>Giải thích</h3>

<ul>

<li>
Kẻ tấn công đã lấy được toàn bộ cơ sở dữ liệu.
</li>

<li>
Nếu mật khẩu lưu bằng <b>MD5</b> hoặc <b>plaintext</b>,
kẻ tấn công có thể sử dụng Rainbow Table hoặc Brute Force để khôi phục mật khẩu.
</li>

<li>
Nếu sử dụng <b>bcrypt (password_hash)</b>,
database vẫn có thể bị rò rỉ nhưng mật khẩu gốc không thể đọc trực tiếp.
</li>

<li>
Thông tin cá nhân như Họ tên, Email và Ngày sinh vẫn bị lộ nếu cơ sở dữ liệu bị đánh cắp.
</li>

</ul>

</div>

<div class="footer">

<a href="profile.php" class="btn">
← Quay lại Profile
</a>

</div>

</div>

</body>
</html>
