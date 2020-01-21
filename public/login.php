<?php
    require_once "../includes/user.php";
    require_once "../includes/sessions.php";

    $user = new User();
    $session = new Session();


	if(isset($_POST['LogIn']))
	{
        
		$username = $_POST['username'];
        $password = $_POST['password'];
        
        $found_user = $user->user_authenticate($username, $password);

        if($found_user){

            foreach ($found_user as $user_detail) 
            {
                $user_detail['id'];
                $user_detail['username'];
    
            }
    
            $user_id = $user_detail['id'];
    
            $username = $user_detail['username'];
    

            $session_values = $session->create_session($user_id, $username);

            if($session_values['id'] && $session_values['username']){
                
                header('Location: index.php');	
            }

        }else{
            echo "Wrong Username and password";
        }

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In </title>
</head>
<body>
    <p>Log In</p>
	<form role="form" action="" method="post">
		<fieldset>
			<div class="form-group">
				<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
			</div>
			<div class="form-group">
				<input class="form-control" placeholder="Password" name="password" type="text" value="">
			</div>
			<!-- Change this to a button or input when using this as a form -->
            <input type="submit" class="btn btn-lg btn-success btn-block" name="LogIn" value="Log In">
            <div class="form-note">
                Don’t have an account? 
                <a href="register.php"><strong>Sign up here</strong></a>
            </div>
		</fieldset>
	</form>
</body>
</html>