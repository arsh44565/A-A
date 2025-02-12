<?php
session_start();
include '../login/config.php'; // Database connection include

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: ../login/index.html');
    exit();
}

$user = $_SESSION['user'];
$email = $user['email']; // User ka email fetch kar rahe hain

// Database se user ka financial data fetch kar rahe hain
$query = "SELECT total_income, total_expence, net_balance FROM user_data WHERE email='$email'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $total_income = $row['total_income'];
    $total_expence = $row['total_expence'];
    $net_balance = $row['net_balance'];
} else {
    $total_income = 0;
    $total_expence = 0;
    $net_balance = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dstyle.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title>
    <style>
        .company-title {
            font-size: 22px; 
            font-weight: bold; 
            text-align: center;
            width: 100%;
        }
        .logo-image {
            display: none;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <span class="logo_name">STAFF</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#"><i class="uil uil-estate"></i><span class="link-name">Dashboard</span></a></li>
                <li><a href="#"><i class="uil uil-files-landscapes"></i><span class="link-name">Content</span></a></li>
                <li><a href="#"><i class="uil uil-chart"></i><span class="link-name">Analytics</span></a></li>
                <li><a href="#"><i class="uil uil-thumbs-up"></i><span class="link-name">Likes</span></a></li>
                <li><a href="#"><i class="uil uil-comments"></i><span class="link-name">Comments</span></a></li>
                <li><a href="#"><i class="uil uil-share"></i><span class="link-name">Shares</span></a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="../login/logout.php"><i class="uil uil-signout"></i><span class="link-name">Logout</span></a></li>
                <li class="mode">
                    <a href="#"><i class="uil uil-moon"></i><span class="link-name">Dark Mode</span></a>
                    <div class="mode-toggle"><span class="switch"></span></div>
                </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="title company-title">
                <i class="uil uil-building"></i>
                <span class="text">AZAD AND ASSOCIATE</span>
            </div>
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-user"></i>
                    <span class="text">Welcome, <?php echo htmlspecialchars($user['name']); ?></span>
                </div>
                <div class="boxes">
                    <div class="box box1"><i class="uil uil-wallet"></i><span class="text">TOTAL SALARY</span><span class="number"><?php echo $total_income; ?></span></div>
                    <div class="box box2"><i class="uil uil-money-withdraw"></i><span class="text">TOTAL ADVANCE</span><span class="number"><?php echo $total_expence; ?></span></div>
                    <div class="box box3"><i class="uil uil-balance-scale"></i><span class="text">NET BALANCE</span><span class="number"><?php echo $net_balance; ?></span></div>
                </div>
            </div>
        </div>
    </section>
    <script src="dscript.js"></script>
</body>
</html>
