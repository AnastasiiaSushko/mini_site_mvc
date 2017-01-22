<?php
/**
 * Created by PhpStorm.
 * User: Nastia
 * Date: 21.11.2016
 * Time: 14:17
 */

namespace Model;


class UserModel extends BaseModel
{
    protected $name = 'users';

    public function newUser($data)
    {

        $users = $this->getAll();
        $new_user = true;
        foreach ($users as $user) {

            if (strcasecmp($data['email'], $user['email']) === 0) {
                $new_user = false;
                break;
            }
        }

        if ($new_user) {
            $query =      "INSERT INTO users
                           SET login = '{$data['login']}', 
                           email= '{$data['email']}',
                           password ='{$data['password']}' 
                           ";

            return $this->db->execute($query);
        } else {
            return false;
        }

    }

    function authUser($id)
    {
        $_SESSION['id'] = $id;
    }

    public function checkLogin($data)
    {
        $users = $this->getAll();
        foreach ($users as $user){
            if(strcasecmp($user['login'], $data['login']) === 0 && $user['password'] == $data['password']){
               $this->authUser($user['id']);
                return true;
            }else{
                return false;
            }
        }


    }


}