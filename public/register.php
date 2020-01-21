<?php
    require_once "../includes/user.php";
    require_once "../includes/sessions.php";

    $user = new User();
    $session = new Session();


	if(isset($_POST['signup']))
	{
        
		$username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];

        $found = $user->check_user($username, $email);

        if($found == 0)
        {
			$new_user = $user->user_register($username, $email, $password);
           if($new_user)
           {
    
            header('login.php');
    
           }else{
    
            echo "Unsuccessful... Something went wrong... Try Again..";
        }
        }else{
    
            echo "Username and email already exist.........";
        }
    
    

	}



?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/css1.css">
	<title>Sign Up</title>
</head>

<body>
	<form role="form" action="" method="post">
		<fieldset>
			<div class="form-group">
				<input class="form-control" placeholder="Username" name="username" type="username" autofocus>
			</div>
			<div class="form-group">
				<input class="form-control" placeholder="Email" name="email" type="text" autofocus>
			</div>
			<div class="form-group">
				<input class="form-control" placeholder="Password" name="password" type="text" value="">
			</div>
			<!-- Change this to a button or input when using this as a form -->
			<input type="submit" class="btn btn-lg btn-success btn-block" name="signup" value="Sign Up">
			<div class="form-note">
				Already have an account ? 
				<a href="login.php">
					<strong>Sign in instead</strong>
				</a>
			</div>
		</fieldset>
	</form>
</body>

</html>