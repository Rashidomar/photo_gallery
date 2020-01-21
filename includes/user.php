
<?php
require_once "database.php";


class User{


    public function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;

    }


    public function find_all(){

        $result_set = $this->find_by_sql("SELECT * FROM users");

        return $result_set;

    }

    public function find_by_id($id=0){

        global $database;

        $result_set = $this->find_by_sql("SELECT * FROM users WHERE id='$id'");

        $found = $database->fetch_assoc($result_set);

        return $found;

    }

    public function user_authenticate($username, $password)
    {

        $enc_password = md5($password);
       
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$enc_password'";

        $result = $this->find_by_sql($query);

        return $result;

    }

    public function check_user($username, $email)
    {
        global $database;
        
        $query = "SELECT * FROM users WHERE username = '$username' OR email= '$email' "; 

        $check = $this->find_by_sql($query);

        $result = $database->num_rows($check);

        return $result;
    }

    public function user_register($username, $email, $password)
    {

        $enc_password = md5($password);

        $query = "INSERT INTO users VALUES ('','$username','$email','$enc_password')";

        $result = $this->find_by_sql($query);

        return $result;

    }

    
}

// $user = new User();

// $found = $user->user_authenticate('omar', 123);

// if($found)
// {
//     echo "found";
// }else{
//     echo "not found";
// }

// $row = $user->find_all();

// foreach($images as $image)
// {
//     echo $image['id'] ."<br>";

//     echo $image["username"];
// }
//   while($row)
// {

//     printf ("%i (%s)\n", $row["id"], $row["username"]);
// }

?>