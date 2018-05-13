<?php 
     session_start();

     //setting a cookie
     $sessionID = session_id(); //storing session id
 
     setcookie("user_login",$sessionID,time()+3600,"/","localhost",false,true); //cookie terminates after 1 hour - HTTP only flag
     
?>


<!DOCTYPE html>
	<html>

		<head>
			<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			<title>Secure Software Systems(SSS) - Assignment 1</title>		
			<link rel="stylesheet" type="text/css" href="style.css">
			<script type="text/javascript" src="conf.js"> </script>
		</head>



<body>
		
	<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">


		<h1 style="font-size: 35px; text-align:center;color: #white;text">Cross Site Request Forgery Protection  </br> Synchronizer Token</h1>
			
				

					<h1>Login</h1>
					
					<span class="close-btn">
   
  </span>
						<form method="POST" action="server.php">
						<input type="text" name="user" placeholder="Username" required="required" class="txt2"/>
						<input type="password" name="pass" placeholder="Password" required="required" class="txt2" />
						<input type="hidden" name="user_csrf" id="IdOfToken" />	 
						<button type="submit" name="submit" class="login100-form-btn">Log in</button>
						</form>
						<script>
								  $('#login-button').click(function(){
								  $('#login-button').fadeOut("slow",function(){
									$("#container").fadeIn();
									TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
									TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
								  });
								});

								$(".close-btn").click(function(){
								  TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
								  TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
								  $("#container, #forgotten-container").fadeOut(800, function(){
									$("#login-button").fadeIn(800);
								  });
								});

</script>

		<p style="text-align:center;color: #95afc0">Done by <a href="https://github.com/VinushDestro/Cross-site-Request-Forgery-protection-Assingment-1">Vinushanth_K_IT16026544</a></p>
</div>


<?php 
    
       if(isset($_COOKIE['user_login']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","IdOfToken");  </script>'; 
                        
            }
    ?>

</body>
</html>
