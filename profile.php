<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ người dùng</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            background:linear-gradient(135deg,#0f172a,#1e293b);
            color:white;
        }

        .container{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px;
        }

        .profile-card{
            width:100%;
            max-width:800px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(10px);
            padding:40px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 8px 30px rgba(0,0,0,0.3);
        }

        h1{
            color:#22c55e;
            margin-bottom:20px;
            font-size:42px;
        }

        .welcome{
            font-size:24px;
            margin-bottom:15px;
        }

        .username{
            color:#60a5fa;
            font-weight:bold;
        }

        .description{
            color:#cbd5e1;
            margin-bottom:30px;
            line-height:1.8;
        }

        .btn{
            display:inline-block;
            padding:14px 28px;
            margin:10px;
            border-radius:8px;
            text-decoration:none;
            color:white;
            font-weight:bold;
            transition:0.3s;
        }

        .btn:hover{
            transform:translateY(-3px);
        }

        .leak{
            background:#dc2626;
        }

        .home{
            background:#2563eb;
        }

        .logout{
            background:#f59e0b;
        }

        .info{
            margin-top:30px;
            padding:20px;
            background:rgba(255,255,255,0.05);
            border-left:5px solid #ef4444;
            border-radius:8px;
            text-align:left;
            color:#e2e8f0;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="profile-card">

        <h1>👤 Hồ sơ người dùng</h1>

        <p class="welcome">
            Xin chào <span class="username">
                <?php echo htmlspecialchars($username); ?>
            </span>
        </p>

        <p class="description">
            Đây là trang hồ sơ người dùng.
            Bạn đã đăng nhập thành công vào hệ thống demo
            OWASP Top 10 A02 – Cryptographic Failures.
        </p>

        <a href="leak.php" class="btn leak">
            🔓 Xem dữ liệu bị rò rỉ
        </a>

        <a href="index.php" class="btn home">
            🏠 Trang chủ
        </a>

        <a href="logout.php" class="btn logout">
            🚪 Đăng xuất
        </a>

        <div class="info">
            <strong>Thông tin bảo mật</strong>
            <br><br>
            Chức năng "Xem dữ liệu bị rò rỉ" mô phỏng hậu quả khi mật khẩu
            được lưu dưới dạng plaintext trong cơ sở dữ liệu.
            Đây là một ví dụ điển hình của
            <strong>OWASP Top 10 A02 – Cryptographic Failures</strong>.
        </div>

    </div>

</div>

</body>
</html>
