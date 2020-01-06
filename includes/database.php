<?php
    require_once('config.php');

    class MySqlDatabase{

    private $connection;

    public function __construct()
    {
        $this->open_conection();
    }

    public function open_conection()
    {
       $connection = mysqli_connect(DB_SERVER,DB_USER, DB_PASSWORD, DB_NAME);
       if($connection)
       {
           echo "OK;";

       }else{
           echo "Failed :" . mysqli_error($connection);
       }
    }     

    }

    $database = new MySqlDatabase();

?>
