<?php
session_start();

// Destroy all session data
$_SESSION = [];
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logged Out</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .logout-box {
        background: #ffffff;
        padding: 40px 30px;
        border-radius: 12px;
        width: 350px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
        margin: 0;
        margin-bottom: 10px;
        color: #333;
        font-size: 24px;
        font-weight: 600;
    }

    p {
        color: #666;
        font-size: 16px;
        margin-bottom: 25px;
    }

    .btn {
        display: inline-block;
        background: #4a90e2;
        color: #fff;
        padding: 12px 25px;
        border-radius: 6px;
        font-size: 16px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn:hover {
        background: #357abd;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>

<div class="logout-box">
    <h2>You are Logged Out</h2>
    <p>Thank you for using the Library System.</p>
    <a href="login.php" class="btn">Login Again</a>
</div>

</body>
</html>
