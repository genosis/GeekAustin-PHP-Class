<?php

require_once 'library/user.php';
require_once 'library/util.php';
require_once 'library/dbconnection.php';

if($_POST){

	if(loggedIn()){
	
		$username = getUsername();
	
		//delet account
		deleteUser($username);
		
		//log out the user
		session_destroy();
		redirect('http://localhost/geekaustinphpclass/vanity/');
	
		// redirect to home
		redirect('/geekaustinphpclass/vanity');
	
	}
	
	//log out the user
	session_destroy();
	redirect('http://localhost/geekaustinphpclass/vanity/');
	
	// redirect to home
	redirect('/geekaustinphpclass/vanity');
	
}
	if(!loggedIn() ){

		redirect('/geekaustinphpclass/vanity/login.php');
	}

include 'includes/header.php';

?>

<br>
Are you sure you want to delet your account?
<form method="POST" action="deletemyaccount.php">
		<label>Post</label>
		<textarea name="delete">
		
		</textarea>
		<input type="submit"/>
	
	</form>