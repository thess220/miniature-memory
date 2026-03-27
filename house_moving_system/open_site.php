<!DOCTYPE html>
<html>
<head>
    <title>YT Mover</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #080808;
        }

        /* NAVBAR*/
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            border-bottom: 2px solid #050505;
        }

        .navbar .logo {
            font-weight: bold;
            font-size: 18px;
        }

        .nav-links a {
        margin-left: 25px;
        text-decoration: none;
        font-size: 14px;
        color: black;
        }

        .nav-links a.login-btn {
        background-color: black;
        color: white;
        padding: 8px 18px;
        border-radius: 4px;
        font-weight: bold;
        }

        /* HERO SECTION*/
        .hero {
            padding: 50px 40px;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 16px;
            color: #555;
            max-width: 600px;
        }

        /* IMAGE*/
        .hero-image {
            margin-top: 30px;
        }

        .hero-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        /* SERVICES*/
        .services {
            padding: 40px;
        }

        .services h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }
        .service-item {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        }

        .service-item img {
        width: 300px;      /* control size here*/
        height: auto;
        margin-right: 20px;
        border-radius: 6px;
        }
        .btn {
        display: inline-block;
        background-color: black;
        color: white;
        padding: 9px 22px;
        border-radius: 2px;
        text-decoration: none;
        font-weight: bold;
        }

        .btn:hover {
        background-color: #333;
        }
        .footer{
        background:black;
        color:white;
        text-align:center;
        padding:12px;
        position:fixed;
        bottom:0;
        width:100%;
        font-size:14px;
        }


    </style>
</head>
<body>
    
<!-- NAVIGATION BAR -->
<div class="navbar">
    <div></div>
    <div class="nav-links">
        <a href="#services">Our Services</a>
        <a href="about_us.php">About Us</a>
        <a href="contact_us.php">Contact Us </a>
        <a href="Start_login.php" class="login-btn">Login</a>
    </div>
</div>

<!-- HERO SECTION -->
<div class="hero">
    <h1>YT Mover</h1>
    <p>
        Your reliable House Moving Services
    </p>

    <div class="hero-image">
        <img src="truck_title.jpg" alt="Moving Truck">
    </div>
</div>

<!-- SERVICES SECTION -->
<!-- SERVICES SECTION -->
<div class="services" id="services">
    <h2>Our Services</h2>
    <p>
        We provide professional house moving services including furniture transport,
        residential moving, and scheduled relocation services.
    </p>

    <div class="service-item">
        <img src="truck.jpeg" alt="40 ton Truck">
        <div>
            <h3>40 ton Truck</h3>
            <p>Suitable for large house moving and heavy furniture.</p>
        </div>
    </div>

    <div class="service-item">
        <img src="truck.jpeg" alt="10 ton Truck">
        <div>
            <h3>10 ton Truck</h3>
            <p>Ideal for medium-sized house moving services.</p>
        </div>
    </div>

    <div class="service-item">
        <img src="truck.jpeg" alt="3 ton Truck">
        <div>
            <h3>3 ton Truck</h3>
            <p>Best for small moves and limited furniture items.</p>
        </div>
    </div>

    <a href="Start_login.php" class="btn">Get Quotation</a>
</div>

    <div class="footer">
        © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
