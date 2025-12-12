<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4A90E2, #7B4397);
            background: url('assets/images/library_bg.png') no-repeat center center fixed;
    background-size: cover; /* cover the whole screen */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #f5f5f5;
            width: 400px;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #444;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            color: #555;
            font-weight: bold;
        }

        input, select {
            width: 95%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4A90E2;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #357ABD;
        }

        .footer {
            margin-top: 15px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form method="POST" action="login_process.php">
        <label>User ID:</label>
        <input type="text" name="user_id" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="">-- Select Role --</option>
            <option value="librarian">Librarian</option>
            <option value="member">Member</option>
        </select>

        <button type="submit">Login</button>
    </form>

    <div class="footer">Library Management System</div>
</div>

</body>
</html>
