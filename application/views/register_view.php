<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('users/register_user'); ?>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" required>
        <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Register">
    <?php echo form_close(); ?>
</body>
</html>