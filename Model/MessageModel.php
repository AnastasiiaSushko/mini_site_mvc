<?php
/**
 * Created by PhpStorm.
 * User: Nastia
 * Date: 21.11.2016
 * Time: 14:55
 */

namespace Model;


class MessageModel extends BaseModel
{
    protected $name = 'messages';
    public function save($data){

        $data['name'] = $this->db->escape($data['name']);
        $data['email'] = $this->db->escape($data['email']);
        $data['message'] = $this->db->escape($data['message']);


                 $query = "INSERT INTO messages 
                           SET name = '{$data['name']}', 
                           email= '{$data['email']}',
                           message ='{$data['message']}' 
                           " ;

        return $this->db->execute($query);
    }

}