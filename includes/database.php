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
       $this->connection = mysqli_connect(DB_SERVER,DB_USER, DB_PASSWORD, DB_NAME);
       if($this->connection)
       {
           #echo "OK;";

       }else{
           echo "Failed :" . mysqli_error($this->connection);
       }
    }
    
    public function query($query)
    {
        $result = mysqli_query($this->connection, $query);

        return $result;
    }

    public function fetch_array($result)
    {
        $result = mysqli_fetch_array($result);

        return $result;
    }

    public function num_rows($result)
    {
        $result = mysqli_num_rows($result);

        return $result;
    }


    }

    $database = new MySqlDatabase();

?>