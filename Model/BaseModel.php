<?php


namespace Model;


use Lib\DB;

class BaseModel
{

    protected $db;
    
    //Name of table
    protected $name;
    
    public function __construct()
    {
        $this->db = new DB();
    }
    
    public function getAll(){
        return $this->db->query("Select * from {$this->name}");
    }

}