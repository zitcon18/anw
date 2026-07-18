<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SecureShop</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f6f9;
}

/* HEADER */
header{
    background:#0d6efd;
    color:white;
    padding:15px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:26px;
    font-weight:bold;
}

nav{
    display:flex;
    align-items:center;
    gap:15px;
}

nav a{
    color:white;
    text-decoration:none;
    font-weight:bold;
}

.user{
    background:rgba(255,255,255,0.2);
    padding:8px 14px;
    border-radius:20px;
}

/* HERO */
.hero{
    text-align:center;
    background:white;
    padding:60px 20px;
}

.hero h1{
    font-size:40px;
    color:#2c3e50;
}

.hero p{
    margin-top:10px;
    color:#666;
}

/* PRODUCTS */
.container{
    width:1100px;
    margin:40px auto;
}

.products{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(250px,1fr));
    gap:20px;
}

.product{
    background:white;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    overflow:hidden;
    transition:.2s;
}

.product img{
    width:100%;
    height:200px;
    object-fit:cover;
    border-bottom:1px solid #eee;
}

.product{
    transition:0.3s;
}

.product:hover{
    transform:scale(1.03);
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
}
.product-body{
    padding:15px;
}

.product-title{
    font-size:18px;
    font-weight:bold;
    color:#333;
}

.product-price{
    margin-top:8px;
    color:#0d6efd;
    font-weight:bold;
}

.product-desc{
    margin-top:8px;
    font-size:14px;
    color:#666;
}

.btn{
    display:inline-block;
    margin-top:12px;
    padding:10px 15px;
    background:#0d6efd;
    color:white;
    text-decoration:none;
    border-radius:6px;
}

.btn:hover{
    background:#084298;
}

/* FOOTER */
footer{
    text-align:center;
    padding:20px;
    margin-top:40px;
    background:#222;
    color:white;
}

</style>

</head>

<body>

<header>

<div class="logo">SecureShop</div>

<nav>

<a href="index.php">Home</a>

<?php if(isset($_SESSION['user'])){ ?>

<span class="user">👤 <?= htmlspecialchars($_SESSION['user']['fullname']) ?></span>
<a href="profile.php">Profile</a>
<a href="logout.php">Logout</a>

<?php } else { ?>

<a href="register.php">Register</a>
<a href="login.php">Login</a>

<?php } ?>

</nav>

</header>

<section class="hero">

<h1>Welcome to SecureShop</h1>
<p>Best digital products & services store</p>

</section>

<div class="container">

<div class="products">

<!-- PRODUCT 1 -->
<div class="product">
<img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=600" alt="">
    <div class="product-body">
        <div class="product-title">USB Security Token</div>
        <div class="product-price">$29.99</div>
        <div class="product-desc">Device used for secure authentication.</div>
        <a href="#" class="btn">Buy Now</a>
    </div>
</div>

<!-- PRODUCT 2 -->
<div class="product">
     <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600" alt="">
    <div class="product-body">
        <div class="product-title">Encrypted Storage Drive</div>
        <div class="product-price">$59.99</div>
        <div class="product-desc">Hardware encrypted USB drive.</div>
        <a href="#" class="btn">Buy Now</a>
    </div>
</div>

<!-- PRODUCT 3 -->
<div class="product">
 <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=600" alt="">
    <div class="product-body">
        <div class="product-title">VPN Subscription</div>
        <div class="product-price">$9.99/month</div>
        <div class="product-desc">Secure your internet connection.</div>
        <a href="#" class="btn">Buy Now</a>
    </div>
</div>

<!-- PRODUCT 4 -->
<div class="product">
    <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=600" alt="">
    <div class="product-body">
        <div class="product-title">Password Manager Pro</div>
        <div class="product-price">$4.99/month</div>
        <div class="product-desc">Store and manage passwords securely.</div>
        <a href="#" class="btn">Buy Now</a>
    </div>
</div>

</div>

</div>

<footer>
© 2026 SecureShop - Secure Digital Store 
</footer>

</body>
</html>
