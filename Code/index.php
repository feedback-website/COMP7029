<!DOCTYPE html>
<html>
<head>
    <title>Module Evaluation Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post" action="login.php">
        <h1>Welcome to the <span class="form-title">Module Evaluation Form</span></h1>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <h2><span class="login">Login</span></h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
		

        <div class="radio-group">
            <label>Are you a:</label>
            <label><input type="radio" name="account_type" value="student" checked>Student</label>
            <label><input type="radio" name="account_type" value="module_leader">Module leader</label>
        </div>
		<input type="submit" name="submit" value="Login">
		<p class="forgot-password">Forgot password?</p>
    </form>

</body>
</html>
