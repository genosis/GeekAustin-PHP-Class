<?php
// HOMEWORK: break this out into another function createPost() 
require_once 'library/util.php';
require_once 'library/user.php';
require_once 'library/dbconnection.php';

if($_POST){

	submitPost(getUserId(), $_POST['post']);
	
	


}


?>

<?include 'includes/header.php'?>



	<form method="POST" action="post.php">
		<label>Post</label>
		<textarea name="post">
		
		</textarea>
		<input type="submit"/>
	
	</form>
	
<? include 'includes/footer.php' ?>




