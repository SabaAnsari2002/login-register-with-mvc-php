<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>Hello, <?= $this->session->userdata('user')['username']; ?>!</p>
    <a href="<?= base_url('index.php/auth/logout') ?>">Logout</a>
</body>
</html>
