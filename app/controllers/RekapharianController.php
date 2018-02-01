<?php

class RekapharianController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function getAjaxAction()
    {
       $keu_harian = new KeuHarian();
       $json_data = $keu_harian->getData();
       die(json_encode($json_data));
    }

}

