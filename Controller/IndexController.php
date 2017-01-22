<?php

namespace Controller;


use Model\MessageModel;

class IndexController extends BaseController
{
    //Папка , где хранятся вьюшки
    protected $name = 'Index';

    public function index()
    {
        $this->render('main');
    }


    //Message doesn't show
    public function contact()
    {
        if($_POST  && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']) ){
            $contact = new MessageModel();
            if($contact->save($_POST)){
                $this->message = 'Thank you for your message';

            }else{
                $this->message = 'Sorry, your message not sent';
            }
           header('Location:/1/index/contact');
        }
        $this->render('contact');
    }


}