<?php
// HOMEWORK
// create a page where a new user can register for your application. collect from them
// a username, a password, and an email address. require them to type their password in 
// twice. store their username, password, and email address in the database. log them in 
// automatically and send them to the main page

require_once 'library/util.php';
require_once 'library/user.php';
include 'includes/header.php';

 
// initial check if there are any POST parameters
if($_POST){


		//Form Validation -- Need a test if username is already taken
		if(!($_POST[username])){
			$error = "&nbsp;&nbsp*Username is empty";
		}
		if(!($_POST[password])){
			$error = $error . "<br>&nbsp;&nbsp*Password is empty";
		}
		if(!($_POST[password2])){
			$error = $error .  "<br>&nbsp;&nbsp*Password confirmation is empty";
		}
		if(!($_POST[email])){
			$error = $error .  "<br>&nbsp;&nbsp*Email is empty";
		} 
		else if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST[email])){
			$error = $error .  "<br>&nbsp;&nbsp*Email is invalid please use email@domain.com format";
		}
		if(!($_POST[password] == $_POST[password2]) ){
			$error = $error .  "<br>&nbsp;&nbsp*Passwords don't match";
		}
		
/*************************************
	// is username available?
	//$usernameAvailable = true;
	
	echo("Username available? " . usernameAvailable($_POST[username]) );
	
	if( !(usernameAvailable($_POST[username]) ) ){
	
		$error = $error .  "<br>&nbsp;&nbsp*Username Taken - Please choose another";
	
	}
***************************************/
	


	if(!$error){
	
//	echo"<br> no error create user";

		createUser($_POST[username], $_POST[password], $_POST[email]);
		
		authenticate($_POST[username], $_POST[password]); 
		
//			echo"New Account for Username: " . $_POST[username] . " created!!!";
			
		redirect('http://localhost/geekaustinphpclass/vanity/');
	
	}

	
}

?>


<? 	if($error){
		echo"<br><font color='red'><b>Please correct the errors noted below:";
		echo("<br>" . $error . "</font></b>"); 
	}?>

<form method="POST" action="signup.php">
    <br><label>Username</label>
    <input type="text" name="username"/>
    <br><label>password</label>
    <input type="password" name="password"/>
	<br><label>retype password</label>
    <input type="password" name="password2"/>
	<br><label>Email</label>
	<input type="text" name="email"/>
<!--	<input type="text" name="error" value=$error/> -->
    <br><input type="submit"/>
</form>





<?php include 'includes/footer.php'?>
