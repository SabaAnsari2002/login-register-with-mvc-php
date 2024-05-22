<!-- application/views/register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('controller/register'); ?>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" /><br />
        
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" /><br />
        
        <label for="username">Username</label>
        <input type="text" name="username" /><br />
        
        <label for="email">Email</label>
        <input type="email" name="email" /><br />
        
        <label for="password">Password</label>
        <input type="password" name="password" /><br />
        
        <button type="submit">Register</button>
    <?php echo form_close(); ?>
</body>
</html>
