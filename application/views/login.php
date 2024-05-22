<!-- application/views/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('controller/login'); ?>
        <label for="username_email">Username or Email</label>
        <input type="text" name="username_email" /><br />
        
        <label for="password">Password</label>
        <input type="password" name="password" /><br />
        
        <button type="submit">Login</button>
    <?php echo form_close(); ?>
</body>
</html>
