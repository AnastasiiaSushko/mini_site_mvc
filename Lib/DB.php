<?php

namespace Lib;


class DB
{
    protected $connection;

    public function __construct()
    {
        $this->connection = new \mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $this->connection->query('SET NAMES UTF8');
        
        if(mysqli_error($this->connection)){
            throw new \Exception('Could not connect to Database');
        }
    }
    
    public function query($sql)
    {
        if(!$this->connection){
            return false;
        }  
        
        if(mysqli_error($this->connection)){
            throw new \Exception(mysqli_error($this->connection));
        }
        
        $result = $this->connection->query($sql);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        
        return $data;
    }

    public function escape($str){
        return mysqli_escape_string($this->connection,$str);
    }


    public function execute($sql){

        $result = $this->connection->query($sql);
        return $result;
    }

   
}