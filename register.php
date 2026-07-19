<?php
include "db.php";

if (isset($_POST['register'])) {

    $fullname  = trim($_POST['fullname']);
    $birthdate = $_POST['birthdate'];
    $email     = trim($_POST['email']);
    $username  = trim($_POST['username']);

    // Hardcoded Encryption Key (LỖ HỔNG DEMO)
  //  $key = "A7f9K2mP8xQ4nL5rT1vW6yZ3cH9bJ0dE";
   //Khac phuc
    $key = getenv("APP_KEY");
    $cipher = "AES-256-CBC";

    // Tạo IV ngẫu nhiên
    $iv = random_bytes(openssl_cipher_iv_length($cipher));

    // Mã hóa email
    $email = base64_encode(
    $iv .
    openssl_encrypt(
        $email,
        $cipher,
        $key,
        OPENSSL_RAW_DATA,
        $iv
    )
);

    // Demo có lỗ hổng (MD5)
//    $password = md5($_POST['password']);
    // Demo an toàn (bcrypt)
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(fullname, birthdate, email, username, password)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssss",
        $fullname,
        $birthdate,
        $email,
        $username,
        $password
    );

    try {
        $stmt->execute();
        $msg = "Đăng ký thành công!";
    } catch (mysqli_sql_exception $e) {

        if ($e->getCode() == 1062) {
            $msg = "Email hoặc tên đăng nhập đã tồn tại!";
        } else {
            $msg = $e->getMessage();
        }
    }
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

      <input
      type="text"
      name="fullname"
      placeholder="Họ và tên"
      required>
 
      <input
      type="date"
      name="birthdate"
      required>

      <input
      type="email"
      name="email"
      placeholder="Email"
      required>

      <input
      type="text"
      name="username"
      placeholder="Tên đăng nhập"
      required>

      <input
      type="password"
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
