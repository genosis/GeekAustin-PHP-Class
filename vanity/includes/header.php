<html>
<head>
	<title>Vanity</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>
<a href="http://localhost/geekaustinphpclass/vanity"><img src="images/vanity.png"/></a>

<?if (loggedIn()) {?>
    Welcome, <font color="blue"><?=getUsername()?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="/geekaustinphpclass/vanity/logout.php">Logout</a>
<?} else{?>
<a href="/geekaustinphpclass/vanity/login.php">Login</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Not Registered? <a href="/geekaustinphpclass/vanity/signup.php">Sign up here</a><br>
<?}?>

