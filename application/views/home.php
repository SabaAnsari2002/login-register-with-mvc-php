<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
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
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #555;
        }
        a {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        <p>Hello, <?= $this->session->userdata('user')['username']; ?>!</p>
        <a href="<?= base_url('index.php/auth/logout') ?>">Logout</a>
    </div>
</body>
</html>
