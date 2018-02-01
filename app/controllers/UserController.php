<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function getAjaxAction()
    {
       $user = new RefUser();
       $json_data = $user->getData();
       die(json_encode($json_data));
    }

}

