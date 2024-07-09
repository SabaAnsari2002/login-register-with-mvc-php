<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Method</title>
</head>
<body>
    <h2>Select Method</h2>
    <!-- فرم برای ثبت‌نام -->
    <form action="<?= base_url('index.php/auth/register') ?>" method="get">
        <button type="submit">Register</button>
    </form>
    <br>
    <!-- فرم برای ورود -->
    <form action="<?= base_url('index.php/auth/login') ?>" method="get">
        <button type="submit">Login</button>
    </form>
</body>
</html>
