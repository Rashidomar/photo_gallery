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

    public function fetch_assoc($result)
    {
        $result = mysqli_fetch_assoc($result);

        return $result;
    }

    public function num_rows($result)
    {
        $result = mysqli_num_rows($result);

        return $result;
    }


    }

    $database = new MySqlDatabase();

    // //$result_set = $database->query("SELECT * FROM users WHERE id=1");

    // $connection = mysqli_connect(DB_SERVER,DB_USER, DB_PASSWORD, DB_NAME);

    // $query = "SELECT * FROM users WHERE id=1";

    // $result = mysqli_query($connection, $query);

    // //$found = $database->fetch_assoc($result_set);

    // if($result)
    // {
    //  while($row = mysqli_fetch_assoc($result))
    //     {

    //         printf ("%i (%s)\n", $row["id"], $row["username"]);
    //     }
    // }
?>