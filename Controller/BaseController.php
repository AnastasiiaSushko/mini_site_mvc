<?php

namespace Controller;


class BaseController
{
    protected $layout = 'default';
    protected $name   = 'Index';
    protected $message;
    protected $data;


    protected function setLayout(){
        if(isset($_SESSION['id'])){
            $this->layout = 'user';
        }
    }

    protected function render($templateName){

        $this->setLayout();
        $data = $this->data;
        $message = $this->message;

        ob_start();
        include SITE_DIR . DS . "View" . DS . $this->name . DS . $templateName . '.php';
        
        //include "{SITE_DIR}{DS}View{DS}{$this->name}{DS}{$templateName}.php";
        $content = ob_get_clean();

        include SITE_DIR . DS . "View" . DS . "Layout". DS. $this->layout. '.php';

    }

    protected function render404()
    {

        $this->setLayout();
        $data = $this->data;
        $message = $this->message;

        ob_start();
        include SITE_DIR . DS . "View" . DS . "Products" . DS . "noProduct.php";
        $content = ob_get_clean();

        include SITE_DIR . DS . "View" . DS . "Layout". DS. $this->layout. '.php';

    }

}