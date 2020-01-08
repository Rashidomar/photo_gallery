<?php
    require_once "../../includes/user.php";
    require_once "../../includes/sessions.php";

    $session = new Session();


    if(isset($_POST['logout'])){

        $result = $session->logout();
        if($result == false){
            header('Location: login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Admin Page</h1>
    <p><?php echo $session->user_id ?> </p>
    <form method="POST">
    <button type="submit"id="login" name="logout">logout</button>
    </form>
</body>
</html>