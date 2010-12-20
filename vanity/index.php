<?php
require_once 'library/user.php';
include 'includes/header.php';
?>

<? if(loggedIn()) { ?>
	<br><br>
	<a href="post.php">Post</a>
	
	
	<? $apost = getPost(); ?>
 
 	<h1>Posts for <?php echo(getUsername()); ?> are: </h1><br>
	<table border=1>
	
	<?php 
		// Loop to cycle through array of posts returned from getPost() above	
			
		foreach($apost as $key ){
				echo($apost['post']);
			
		echo("<tr><td>" . date("m/d/Y g:i:s A", $key['created_at'] ) . 
		     "</td><td>" . $key['post'] . "</td></tr> ");
		
		}

  
  	?>
	</table>
	
	<br><br>
	<?}?>

<? /*
	else{  

		echo"<br>Log in to get Started!!!";
		echo"<br>Not Registered? <a href='signup.php'>Sign Up Here</a>";
	
	} 
*/
?>

<?

//Testing out deleteUser function
//deleteUser(test);


include 'includes/footer.php';
?>
