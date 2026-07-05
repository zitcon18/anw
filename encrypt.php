<?php

$key = "0123456789abcdef0123456789abcdef"; // Hardcoded Key

$iv = random_bytes(16);

$data = "CCCD: 012345678901";

$cipher = openssl_encrypt(
    $data,
    "AES-256-CBC",
    $key,
    OPENSSL_RAW_DATA,
    $iv
);

$cipher64 = base64_encode($cipher);
$iv64 = base64_encode($iv);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Hardcoded Encryption Key Demo</title>

<style>

body{
    margin:0;
    background:#f4f6f9;
    font-family:Arial,Helvetica,sans-serif;
}

.container{
    width:750px;
    margin:50px auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,.15);
}

h2{
    text-align:center;
    color:#2c3e50;
}

.alert{
    background:#ffe8e8;
    border-left:6px solid red;
    padding:15px;
    margin:20px 0;
}

.title{
    font-weight:bold;
    margin-top:20px;
}

.box{
    background:#272822;
    color:#00ff7f;
    padding:12px;
    border-radius:8px;
    word-break:break-all;
    font-family:Consolas;
}

button{
    width:100%;
    margin-top:25px;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#007bff;
    color:white;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#0056b3;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h2>Hardcoded Encryption Key Demo</h2>

<div class="alert">
<b>Lỗ hổng:</b> Khóa AES được ghi trực tiếp trong source code.
</div>

<div class="title">Dữ liệu gốc</div>

<div class="box">
<?= htmlspecialchars($data) ?>
</div>

<div class="title">IV (Base64)</div>

<div class="box">
<?= $iv64 ?>
</div>

<div class="title">Ciphertext (Base64)</div>

<div class="box">
<?= $cipher64 ?>
</div>

<form action="decrypt.php" method="post">

<input type="hidden" name="cipher" value="<?= $cipher64 ?>">

<input type="hidden" name="iv" value="<?= $iv64 ?>">

<button type="submit">
Giải mã
</button>

</form>

</div>

</div>

</body>
</html>
