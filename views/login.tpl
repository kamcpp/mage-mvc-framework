<html>
<head>
	<title>Login Example</title>
</head>
<body>
	{if isset($errorMessage)}
	  <h6 style="color: red">{$errorMessage}</h6>
	{/if}
	<form method="post">
		Username <input type="text" name="username" /><br />
		Password <input type="text" name="password" /><br />
		<input type="submit" value="Login" />
	</form>
</body>
</html>