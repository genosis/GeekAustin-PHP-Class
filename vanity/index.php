<?php
require_once 'library/user.php';
include 'includes/header.php';
?>

<? if(loggedIn()) { ?>
	<br><br>
	<a href="post.php">Post</a>
	
	<? $apost = getPost(); ?>
 
	<table border=1>
	
	<?php 
		echo"var dump is: <br>";
		var_dump($apost);
		
		while( $apost ){
			//	echo($apost['post']);
			
		echo("<tr><td>Posted on: " . $apost['created_at'] . "</td></tr> ");
		
		}
	/*
			<td> <? while( $result ){
				echo($apost['post']);
			} ?> on 
			<? echo( date('m-d-Y  h:m a', $apost['created_at'] ) );?> 
			</td>
		</tr>
	*/
  
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
