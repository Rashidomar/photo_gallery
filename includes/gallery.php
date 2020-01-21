<?php
require_once "database.php";


class Gallery{

    private $max_size = 2000000;

    public function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;

    }

    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM images");

        return $result_set;

    }

    public function find_by_id($id=0){

        global $database;

        $result_set = $this->find_by_sql("SELECT * FROM images WHERE id='$id'");

        $found = $database->fetch_assoc($result_set);

        return $found;

    }

    public function check($extension, $image_size )
    {

        $extensions = array("png", "jpeg", "jpg");

        if(in_array($extension, $extensions) && $image_size <= $this->max_size)
        {
            return true;
        }
        

    }


    public function create_image($image_title,$image_name, $image_size, $user_id)
    {
        global $database;


        $query = "INSERT INTO images VALUES ('','$image_title','$image_name','$image_size',  $user_id)";

        $result = $database->query($query);

        return $result;

    }


    public function delete_image($id="")
    {
        global $database;

        $query = "DELETE FROM `images` WHERE id='$id'";

        $result = $database->query($query);

        return $result;

    }

    public function create_ablum($ablum_name)
    {
        global $database;


        $query = "INSERT INTO ablums VALUES ('','$ablum_name')";

        $result = $database->query($query);

        return $result;

    }


    public function delete_ablum($id="")
    {
        global $database;

        $query = "DELETE FROM `ablums` WHERE id='$id'";

        $result = $database->query($query);

        return $result;

    }    
}


// foreach($images as $image)
// {
//     echo $image['title'] ."<br>";

//     echo ' <img src="galleryImage/'.$image["name_image"].'" alt="...">';
// }

// while ($images) {
//     //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);

//     echo $images['title'] ."<br>";

//     echo ' <img src="galleryImage/'.$images["ImageName"].'" alt="...">';
// }

// var_dump($images);

?>