<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }
        input {
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
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
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="error"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('index.php/auth/do_register') ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
