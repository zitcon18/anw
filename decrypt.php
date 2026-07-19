<?php

$result = "";

if(isset($_POST['decrypt'])){

    $key = trim($_POST['key']);

    $cipher = "AES-256-CBC";

    $data = base64_decode(trim($_POST['cipher']));

    $iv = substr($data,0,16);

    $ciphertext = substr($data,16);

    $result = openssl_decrypt(
        $ciphertext,
        $cipher,
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    if($result===false){
        $result="Sai Key hoặc dữ liệu không hợp lệ!";
    }

}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Hardcoded Encryption Key Demo</title>

<style>

body{
    background:#f2f2f2;
    font-family:Arial;
}

.card{
    width:750px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.2);
}

textarea,input{
    width:100%;
    padding:10px;
    margin:10px 0;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
}

.result{
    margin-top:20px;
    background:#d4edda;
    padding:15px;
    border-left:5px solid green;
}

.alert{
    background:#ffe8e8;
    padding:15px;
    border-left:5px solid red;
    margin-bottom:20px;
}

</style>

</head>

<body>

<div class="card">

<h2>Demo Hardcoded Encryption Key</h2>

<form method="post">

<label>Encryption Key</label>

<input
type="text"
name="key"
placeholder="Nhập Key lấy được từ source code..."
required>

<label>Ciphertext (Base64)</label>

<textarea
name="cipher"
rows="5"
placeholder="Paste Ciphertext..."
required></textarea>

<button name="decrypt">

Giải mã

</button>

</form>

<?php

if($result!=""){

?>

<div class="result">

<h3>Kết quả</h3>

<?= htmlspecialchars($result) ?>

</div>

<?php

}

?>

</div>

</body>

</html>
