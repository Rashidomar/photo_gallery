<?php
    #require_once "../../includes/database.php";
    require_once "../../includes/user.php";
    require_once "../../includes/sessions.php";

    $user = new User();
    $session = new Session();


	if(isset($_POST['submit']))
	{
        
		$username = $_POST['username'];
        $password = $_POST['password'];
        
        $found_user = $user->user_login($username, $password);
        
        if($found_user){
            $id = $session->login($username);
            
            if($id){
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
    <form method="POST" action="">
        Username : <br>
        <input type="text" name="username"> <br>
        Password : <br>
        <input type="text" name="password" > <br>
        <input type="submit" value="Log In" name="submit" > <br>
    </form>
</body>
</html>