<?php
    require_once "../includes/user.php";
    require_once "../includes/sessions.php";
    require_once "../includes/gallery.php";

    $session = new Session();

    $gallery = new Gallery();


    if(isset($_POST['logout'])){

        $result = $session->logout();
        if($result == false){
            header('Location: login.php');
        }
    }

    $images = $gallery->find_all();

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
    <h1>Home Pag</h1>
    <p><?php
        if($session->is_logged_in())
        {
        echo
            '<p>'.$session->username.'</p>'.
            '<form method="POST">
                <button type="submit"id="login" name="logout">logout</button>
            </form> <br><br>';
        
        echo '<a href="upload_image.php"><strong>Add Image</strong></a>';
        }else
        {
         echo  '<a href="login.php"><strong>Sign In</strong></a><t> <t>';
         echo  '<a href="register.php"> <strong>Sign Up</strong></a> <br> <br>';
         echo  '<a href="login.php"><strong>Add Image</strong></a>';
        }

        ?>
    </p>

    <p><?php
        

        foreach($images as $image)
        {
            echo $image['image_title'].'<img src="images/'.$image["name_image"].'">'. "<br>";

        }

        // while ($images) {
        //     //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);

        //     echo $images['title'] ."<br>";

        //     echo ' <img src="galleryImage/'.$images["ImageName"].'" alt="...">';
        // }

        // ?>
    </p>

</body>
</html>