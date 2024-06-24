<?php 
class Controller {
    //properties
    public $conn;
    public $req;
    public $params;
    public $files;

    public function __construct () {
        $this->req = $_POST;
        $this->params = $_GET;
        $this->files = $_FILES;


        $this->conn = DB::getConn();
        var_dump($this->conn);
    }
} 

?>