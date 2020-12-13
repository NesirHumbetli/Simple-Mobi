<?php


class DBController
{
    protected $hos = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $db = "mobishop";

    public $con = null;

    public function __construct()
    {
        $this->con = mysqli_connect($this->hos,$this->user,$this->password,$this->db);
        if($this->con->connect_error){
            echo "Fail".$this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    protected function closeConnection()
    {
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}
