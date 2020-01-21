<?php
   require_once "../includes/user.php";
   require_once "../includes/sessions.php";
   require_once "../includes/gallery.php";

    $image = new Gallery();
    $session = new Session();

    $extensions = array("png", "jpeg", "jpg");

    $max_size = 2000000;
    
    $location = "images/";

    $name = 1;

if(isset($_POST["upload"]))
{
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];

    $image_title = $_POST['image_title'];


    $new_image_name = $image_name;


    if(file_exists($location.$image_name))
    {
        $new_image_name = $name++.$image_name;
    }
    $extension = substr(strrchr($new_image_name, '.'), 1);
        
    if(in_array($extension, $extensions) && $image_size <= $max_size)
    {
        //echo $image_title. " ".$new_image_name. " ". $image_size . " ".$session->user_id;
        $result = $image->create_image($image_title ,$new_image_name, $image_size, $session->user_id);
        if($result)
        {
            move_uploaded_file($tmp_name, $location.$new_image_name);
        }
            
    }
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/css1.css">
	<title>Sign Up</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <!-- <strong><a href="gallery.php">View Image Gallery</a> </strong>
            <a href="logout.php">Logout</a> <br><br> -->
            <form role="form" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Upload Image</legend>
                    <div class="form-group">
                        <label for="name">Image Title</label>
                        <input type="text" name="image_title" placeholder="Image Title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="name">Choose Image:</label>
                        <input type="file" name="image" placeholder="Choose file" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" value="upload" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

</body>

</html>