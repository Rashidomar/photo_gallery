
<?php
require_once "database.php";


class User{


    public function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;

    }


    public function find_all(){
        global $database;
        $result_set = $database->$this->find_by_sql("SELECT * FROM users");
        return $result_set;

    }

    public function find_by_id($id=0){
        global $database;
        $result_set = $database->$this->find_by_sql("SELECT * FROM users WHERE id='$id'");
        $found = $database->fetch_array($result_set);
        return $found;

    }

    public function user_login($username, $password)
    {
        global $database;
        $enc_password = md5($password);
       
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$enc_password'";

        $result = $database->query($query);

        return $result;

    }
    
}

?>