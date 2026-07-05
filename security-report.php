<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Security Report - SecureShop</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
    margin:0;
}

.container{
    width:900px;
    margin:40px auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
}

h1{
    text-align:center;
    color:#2c3e50;
}

.section{
    margin-top:25px;
    padding:20px;
    border-left:6px solid #0d6efd;
    background:#f8f9fa;
}

.high{
    border-left-color:#dc3545;
}

.medium{
    border-left-color:#ffc107;
}

.low{
    border-left-color:#28a745;
}

.badge{
    display:inline-block;
    padding:5px 10px;
    border-radius:6px;
    color:white;
    font-size:12px;
}

.red{background:#dc3545;}
.yellow{background:#ffc107;color:black;}
.green{background:#28a745;}

code{
    background:#eee;
    padding:2px 5px;
    border-radius:4px;
}

</style>

</head>
<body>

<div class="container">

<div class="card">

<h1>🔐 Security Assessment Report</h1>

<p style="text-align:center;color:#666;">
OWASP Top 10 - A02: Cryptographic Failures
</p>

<!-- ISSUE 1 -->
<div class="section high">
    <h3>1. Weak Password Storage</h3>
    <span class="badge red">HIGH RISK</span>
    <p>
        Hệ thống sử dụng <code>MD5</code> để lưu mật khẩu → có thể bị crack bằng wordlist/rainbow table.
    </p>
    <p><b>Impact:</b> Lộ tài khoản người dùng khi database bị rò rỉ.</p>
</div>

<!-- ISSUE 2 -->
<div class="section high">
    <h3>2. Database Leak Exposure</h3>
    <span class="badge red">HIGH RISK</span>
    <p>
        Trang <code>leak.php</code> hiển thị toàn bộ dữ liệu users mà không kiểm soát truy cập.
    </p>
    <p><b>Impact:</b> Attacker có thể truy cập toàn bộ username/password.</p>
</div>

<!-- ISSUE 3 -->
<div class="section high">
    <h3>3. Hardcoded Encryption Key</h3>
    <span class="badge red">HIGH RISK</span>
    <p>
        Khóa mã hóa được lưu trực tiếp trong source code:
        <code>$key = "1234567890123456";</code>
    </p>
    <p><b>Impact:</b> Nếu lộ source code → có thể giải mã toàn bộ dữ liệu.</p>
</div>

<!-- ISSUE 4 -->
<div class="section medium">
    <h3>4. Weak Hashing Algorithm</h3>
    <span class="badge yellow">MEDIUM</span>
    <p>
        MD5 không còn an toàn cho password hashing.
    </p>
</div>

<!-- FIX -->
<div class="section low">
    <h3>5. Recommended Fixes</h3>
    <span class="badge green">SAFE PRACTICE</span>
    <ul>
        <li>Use <code>password_hash()</code> instead of MD5</li>
        <li>Use <code>password_verify()</code> for login</li>
        <li>Remove hardcoded keys → use environment variables</li>
        <li>Restrict access to sensitive pages</li>
        <li>Use HTTPS for all communication</li>
    </ul>
</div>

<!-- FLOW -->
<div class="section">
    <h3>Attack Flow Summary</h3>
    <p>
        User → Register → Login → Profile → Leak Database → Data Exposure → Key Extraction → Decryption Attack
    </p>
</div>

</div>

</div>

</body>
</html>
