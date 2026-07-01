<?php
include "db.php";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";

    $conn->query($sql);

    $msg = "Đăng ký thành công!";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Crypto Demo</title>

<style>
body{
    font-family: Arial;
    background:#f2f2f2;
}

.container{
    width:400px;
    margin:100px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

input{
    width:100%;
    padding:10px;
    margin-top:10px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:10px;
    background:#007bff;
    color:white;
    border:none;
}

.success{
    color:green;
}
</style>

</head>
<body>

<div class="container">
    <h2>Đăng ký tài khoản</h2>

    <?php
    if(isset($msg))
        echo "<p class='success'>$msg</p>";
    ?>

    <form method="POST">
        <input type="text"
               name="username"
               placeholder="Tên đăng nhập"
               required>

        <input type="password"
               name="password"
               placeholder="Mật khẩu"
               required>

        <button name="register">
            Đăng ký
        </button>
    </form>

    <br>

    <a href="login.php">
        Đăng nhập
    </a>
</div>

</body>
</html>
