<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Method</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Method</h2>
        <!-- فرم برای ثبت‌نام -->
        <form action="<?= base_url('index.php/auth/register') ?>" method="get">
            <button type="submit">Register</button>
        </form>
        <!-- فرم برای ورود -->
        <form action="<?= base_url('index.php/auth/login') ?>" method="get">
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
