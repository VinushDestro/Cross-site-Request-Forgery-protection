<?php

	session_start(); 
 
generateToken();
//store in array



if(isset($_POST['submit']))
{
    ob_end_clean(); 
    
    validate($_POST['user'],$_POST['pass'],$_POST['user_csrf'],$_COOKIE['user_login']);

}

//generating csrf token
		function generateToken(){

			if(empty($_SESSION['key']))
				{
					$_SESSION['key']=bin2hex(random_bytes(32));       
				}

			$token = hash_hmac('sha256',"token for user login",$_SESSION['key']);
			$_SESSION['CSRF_TOKEN'] = $token;

			ob_start(); //store  in buffer
			echo $token;

}

//validate 

function validate($username, $password,$user_token,$user_sessionCookie)
{

    if($username=="ADMIN" && $password=="ADMIN123")
    {
        if($user_token==$_SESSION['CSRF_TOKEN'] && $user_sessionCookie==session_id())
			{
				echo "<script> alert('Successfully  Logged In') </script>";
				//looged page
				echo "<script type=\"text/javascript\"> window.location.href = 'logged.php'; </script>";
			
			}
				else
					{
						echo "<script> alert('Login failed! CSRF Token not matching!!') </script>"; 
						
           
						echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";
            
					}   
				
    }
			else{
					echo "<script> alert('Login failed! Check your username, password and login again!!') </script>"; 
           
					echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";

				}

    
}


?>