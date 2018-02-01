<?php

class RekaphistoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function getAjaxAction()
    {
        $user = new ViewHistoryPerhari();
        $json_data = $user->getDataHistory();
        die(json_encode($json_data));
    }

    public function getAjaxPerbulanAction()
    {
        $user = new ViewHistoryPerbulan();
        $json_data = $user->getDataHistory();
        die(json_encode($json_data));
    }

    public function getAjaxPertahunAction()
    {
        $user = new ViewHistoryPerbulan();
        $json_data = $user->getDataHistory();
        die(json_encode($json_data));
    }
}
