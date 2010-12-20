<?php
require_once 'dbconnection.php';
session_start();
function authenticate($username, $password)
{
    global $db;
    $sql = "SELECT *
            FROM users
            WHERE username='$username'
            LIMIT 1";
    

    
    
    $results = $db->query($sql);
    
    $result = $results->fetch(PDO::FETCH_ASSOC);

	//add info from query to the session
    if ($username === $result['username'] && $password === $result['password']) {
        $_SESSION['username'] = $username;
		$_SESSION['id'] = $result['id'];
		$_SESSION['email'] = $result['email'];

        return true;
    }
    return false;
}

function getUsername()
{
    return $_SESSION['username'];
}

function getUserId(){

	return $_SESSION['id'];
}

function loggedIn()
{
    return isset($_SESSION['username']);
}

function logout(){
	session_destroy();
	redirect('http://localhost/geekaustinphpclass/vanity/');

}

function createUser($username, $password, $email)
{
    //homework helper function
	global $db;
				   
	$sql = "INSERT INTO users (username, password, email)
				   VALUES ('" . $username ."', '" . $password ."', '" . $email ."')";
				   
  
	$results = $db->query($sql);
    
	$result = $results->fetch(PDO::FETCH_ASSOC);
	
}

function deleteUser($username)
{
    //homework helper function
	
	global $db;
				   
	$sql = "SELECT *
            FROM users
            WHERE username='$username'
            LIMIT 1";

   
	$results = $db->query($sql);
    
	$result = $results->fetch(PDO::FETCH_ASSOC);
	
/*    echo"<pre><br>Results are: ";
	print_r($result);
	echo"<pre>";
*/
	
	$id = $result[id];
	
	echo("<br>id is: " . $id);
	
	$sql = "DELETE 
        FROM users
        WHERE id=$id";
		
	$results = $db->query($sql);
	
	echo("<br><br> The User with username: " . $result[username] . " has been deleted!");
   

}

//Check if username is available
function usernameAvailable($username){

    global $db;
    $sql = "SELECT *
            FROM users
            WHERE username='$username'
            LIMIT 1";
			
    

    
    
    $results = $db->query($sql);
    
    $result = $results->fetch(PDO::FETCH_ASSOC);
 
echo("form username is: " . $username . " DB username is: " . $result['username'] . "<br>"); 
    
    if ($username == $result['username']) {

        return true;
    }
    return false;

}

// add a record to posts table - user_id, post
function submitPost($userID, $post){

	global $db;

	//$userID = getUserId();
	$createdAt = time();
	//$post = $_POST['post'];

	$sql = "INSERT INTO posts (user_id, post, created_at)
			VALUES ('$userID', '$post', '$createdAt');";
			
	$result = $db->query($sql);
	
	if($result){
		if($result->rowCount() === 1){
			redirect('http://localhost/geekaustinphpclass/vanity/');
		}
		echo"<br>Error post not submitted!<br>";
	}

}

// get records from posts table - return array of posts
function getPost(){

	global $db;
	$id =  getUserId();
	
    $sql = "SELECT *
            FROM posts
            WHERE user_id=$id";
			
    $results = $db->query($sql);
    
	while ($result = $results->fetch(PDO::FETCH_ASSOC)) {
		echo"<pre>";
    	//echo("test post: " . $result['post'] . "<br>");
    	echo"</pre>";
	}
	
	echo"printR in getPost function is: <br>";
	print_r($result);
	
	return $result;
}