<!-- application/views/dashboard.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $user->first_name; ?></h1>
    <a href="<?= site_url('controller/logout') ?>">Logout</a>
</body>
</html>
