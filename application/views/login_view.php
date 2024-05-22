<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php echo validation_errors(); ?>
    <?php echo $this->session->flashdata('error'); ?>
    <?php echo form_open('users/login_user'); ?>
        <label for="username_email">Username or Email</label>
        <input type="text" name="username_email" id="username_email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Login">
    <?php echo form_close(); ?>
    <a href="<?php echo base_url('users/register'); ?>">Register</a>
</body>
</html>