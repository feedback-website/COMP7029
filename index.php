<!DOCTYPE html>
<html>
<head>
	<title>Module Evaluation Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<form action="login.php" method="post">
	<h1>Welcome to the <span class="form-title">Module Evaluation Form</span></h1>
	
	<?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
		<h2><span class="login">Login</span></h2>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username">
		<label for="password">Password:</label>
		<input type="password" id="password" name="password">
		<input type="submit" value="Login">
		<p class="forgot-password">Forgot password?</p>
	</form>

</body>
</html>

