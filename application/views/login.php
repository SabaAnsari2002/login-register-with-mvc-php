<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php if ($this->session->flashdata('error')): ?>
        <div><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <h2>Login</h2>
    <form action="<?= base_url('index.php/auth/do_login') ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
