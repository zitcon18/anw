<?php

$key = "0123456789abcdef0123456789abcdef"; // Hardcoded Key

$result = "";

if (isset($_POST['decrypt'])) {

    $cipher = base64_decode(trim($_POST['cipher']));
    $iv = base64_decode(trim($_POST['iv']));

    $result = openssl_decrypt(
        $cipher,
        "AES-256-CBC",
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    if ($result === false) {
        $result = "Giải mã thất bại!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Decrypt Demo</title>

<style>

body{
    background:#f5f5f5;
    font-family:Arial;
}

.card{
    width:700px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.15);
}

textarea,input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border-radius:6px;
    border:1px solid #ccc;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.result{
    margin-top:20px;
    padding:15px;
    background:#e8f5e9;
    border-left:5px solid green;
}

</style>

</head>

<body>

<div class="card">

<h2>Hardcoded Encryption Key - Decrypt</h2>

<form method="post">

<label>Ciphertext (Base64)</label>

<textarea name="cipher" rows="5"></textarea>

<label>IV (Base64)</label>

<input type="text" name="iv">

<button name="decrypt">
Decrypt
</button>

</form>

<?php
if($result!=""){
?>
<div class="result">

<b>Plaintext:</b><br>

<?= htmlspecialchars($result) ?>

</div>

<?php } ?>

</div>

</body>
</html>
