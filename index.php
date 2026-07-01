<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OWASP Top 10 A02 - Cryptographic Failures</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color:white;
        }

        .hero{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px;
        }

        .content{
            max-width:900px;
            text-align:center;
        }

        h1{
            font-size:60px;
            color:#ef4444;
            margin-bottom:15px;
        }

        h2{
            font-size:32px;
            margin-bottom:25px;
            font-weight:300;
        }

        p{
            font-size:20px;
            line-height:1.8;
            color:#e2e8f0;
        }

        .info{
            margin:35px 0;
            padding:25px;
            background:rgba(255,255,255,0.08);
            border-radius:12px;
            text-align:left;
        }

        .info ul{
            margin-top:15px;
            padding-left:25px;
        }

        .info li{
            margin:10px 0;
        }

        .buttons{
            margin-top:40px;
        }

        .btn{
            display:inline-block;
            padding:15px 35px;
            margin:10px;
            text-decoration:none;
            color:white;
            font-size:18px;
            border-radius:8px;
            transition:.3s;
        }

        .register{
            background:#2563eb;
        }

        .login{
            background:#16a34a;
        }

        .btn:hover{
            transform:translateY(-3px);
        }

        .warning{
            margin-top:40px;
            background:#7f1d1d;
            border-left:6px solid #ef4444;
            padding:20px;
            border-radius:10px;
            text-align:left;
        }

        .footer{
            margin-top:30px;
            color:#94a3b8;
            font-size:14px;
        }
    </style>
</head>
<body>

<div class="hero">

    <div class="content">

        <h1>🔐 OWASP Top 10 A02</h1>

        <h2>Cryptographic Failures</h2>

        <p>
            Demo lưu trữ mật khẩu không an toàn và hậu quả khi cơ sở dữ liệu bị rò rỉ.
            Mô hình thực hành được xây dựng bằng PHP và MySQL.
        </p>

        <div class="info">
            <h3>Mục tiêu của bài thực hành</h3>

            <ul>
                <li>Đăng ký tài khoản người dùng.</li>
                <li>Lưu mật khẩu dạng Plaintext.</li>
                <li>Đăng nhập hệ thống.</li>
                <li>Xem dữ liệu bị rò rỉ.</li>
                <li>Khắc phục bằng password_hash().</li>
                <li>Xác thực bằng password_verify().</li>
            </ul>
        </div>

        <div class="buttons">
            <a href="register.php" class="btn register">
                Đăng ký
            </a>

            <a href="login.php" class="btn login">
                Đăng nhập
            </a>
        </div>

        <div class="warning">
            <strong>⚠ Cảnh báo bảo mật</strong>
            <br><br>
            Lưu mật khẩu dưới dạng plaintext là một lỗi nghiêm trọng thuộc
            OWASP Top 10 A02 – Cryptographic Failures.
            Nếu cơ sở dữ liệu bị rò rỉ, kẻ tấn công có thể đọc trực tiếp toàn bộ mật khẩu người dùng.
        </div>

        <div class="footer">
            Secure Coding Lab | PHP • MySQL • OWASP Top 10
        </div>

    </div>

</div>

</body>
</html>
