<?php

namespace Controller;


use Model\UserModel;

class UserController extends BaseController
{
    protected $name = 'User';

    public function registration(){


        if($_POST  && !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']) )
        {
            $user = new UserModel();

            if (!$user->newUser($_POST)) {
                setcookie ('message', "", time() - 3600);
               setcookie('message','This user already exist');

            } else {
                setcookie ('message', "", time() - 3600);
                setcookie('message', 'Thank you for registration! Please, log in');

            }

            header('Location:/1/user/registration');

        }

        $this->render('registration');
    }


    public function login(){

        if($_POST  && !empty($_POST['login']) && !empty($_POST['password'])){

            $users = new UserModel();
            if($users->checkLogin($_POST)){
                header('Location:/1/index/index');
            }
        }

        $this->render('login');
    }

    public function logout(){
        unset($_SESSION['id']);
        $this->name='index';
        $this->render('main');
    }
    
    public function profile()
    {
        if (isset($_SESSION['id'])) {
            $this->render('profile');
        }else {
            header('Location:/1/index/index');
        }
    }

   
}