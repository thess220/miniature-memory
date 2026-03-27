<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//make sure customer logged in
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Moving Order | YT Mover</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            font-size: 14px;
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 18px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
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
    <?php include "header.php"; ?>

<div class="container">
    <h2>Create Moving Order</h2>

    <form action="create_order_process.php" method="POST">

        <label>Pickup Location</label>
        <select name="pickup_location" required>
            <option value="">Select location</option>
            <option value="Ipoh">Ipoh</option>
            <option value="Klebang">Klebang</option>
            <option value="Chemor">Chemor</option>
            <option value="Pengkalan">Pengkalan</option>
            <option value="Botani">Botani</option>
        </select>

        <label>Delivery Location</label>
        <select name="delivery_location" required>
            <option value="">Select location</option>
            <option value="Ipoh">Ipoh</option>
            <option value="Klebang">Klebang</option>
            <option value="Chemor">Chemor</option>
            <option value="Pengkalan">Pengkalan</option>
            <option value="Botani">Botani</option>

        </select>

        <label>Moving Date</label>
        <input type="date" name="moving_date" required>

        <label>Cabinets 0.8 ton (qty)</label>
        <input type="number" name="cabinet" min="0" value="0" oninput="calculateQuotation()" required>

        <label>Sofa Beds 0.6 ton (qty)</label>
        <input type="number" name="sofa_bed" min="0" value="0" oninput="calculateQuotation()" required>

        <label>Beds 0.7 ton (qty)</label>
        <input type="number" name="bed" min="0" value="0" oninput="calculateQuotation()" required>

        <label>Chairs 0.2 ton (qty)</label>
        <input type="number" name="chair" min="0" value="0" oninput="calculateQuotation()" required>

        <label>Refrigerators 0.5 ton (qty)</label>
        <input type="number" name="fridge" min="0" value="0" oninput="calculateQuotation()" required>

        </select>

        <hr>

        <h3>Estimated Quotation</h3>
        <p id="load">Estimated Load: 0 ton</p>
        <p id="truck">Recommended Truck: -</p>
        <p id="price">Estimated Price: RM 0</p>

        <button type="submit">Submit Order</button>
    </form>
</div>

    <script>
        function calculateQuotation() {

        let cabinet = parseFloat(document.querySelector("[name='cabinet']").value) || 0;
        let sofa = parseFloat(document.querySelector("[name='sofa_bed']").value) || 0;
        let bed = parseFloat(document.querySelector("[name='bed']").value) || 0;
        let chair = parseFloat(document.querySelector("[name='chair']").value) || 0;
        let fridge = parseFloat(document.querySelector("[name='fridge']").value) || 0;

        // Load calculation (ton)
        let totalLoad =
            (cabinet * 0.8) +
            (sofa * 0.6) +
            (bed * 0.7) +
            (chair * 0.2) +
            (fridge * 0.5);

        let truck = "-";
        let price = 0;

        // Truck recommendation
        if (totalLoad > 0 && totalLoad <= 3) {
            truck = "16 ft (3 ton)";
            price = 400;
        } else if (totalLoad <= 10) {
            truck = "26 ft (10 ton)";
            price = 500;
        } else if (totalLoad > 10) {
            truck = "40 ft (30 ton)";
            price = 650;
        }

        // Display results
        document.getElementById("load").innerText =
            "Estimated Load: " + totalLoad.toFixed(2) + " ton";

        document.getElementById("truck").innerText =
            "Recommended Truck: " + truck;

        document.getElementById("price").innerText =
            "Estimated Price: RM " + price;
        }
    </script>

<div class="footer">
© 2026 YT Mover. All Rights Reserved.
</div>

</body>
</html>
