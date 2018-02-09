<?php

class GraphicController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function getGraphicAction()
    {
        $data = new ViewHistoryPerhari();
        $json_data = $data->getDataGraphic();
        die(json_encode($json_data));
    }

    public function getGraphicFilterAction()
    {
      $user = new ViewHistoryPerhari();
      $Kode = '%';
      if (!empty($_POST["Kode"])) {
         $Kode = $this->request->getPost("Kode");
      }
      //$json_data = $akun->getData();
      if ($Kode != '') {
         $json_data = $user->graphicFilter($Kode);
      } else {
         $json_data = $user->getGraphic();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
      die(json_encode($json_data));
    }

    public function getGraphicPerbulanAction()
    {
        $data = new ViewHistoryPerbulan();
        $json_data = $data->getDataGraphic();
        die(json_encode($json_data));
    }

    public function getGraphicFilterPerbulanAction()
    {
      $user = new ViewHistoryPerbulan();
      $Kode = '%';
      if (!empty($_POST["Kode"])) {
         $Kode = $this->request->getPost("Kode");
      }
      //$json_data = $akun->getData();
      if ($Kode != '') {
         $json_data = $user->graphicFilter($Kode);
      } else {
         $json_data = $user->getDataGraphic();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
      die(json_encode($json_data));
    }

    public function getGraphicPertahunAction()
    {
        $data = new ViewHistoryPertahun();
        $json_data = $data->getDataGraphic();
        die(json_encode($json_data));
    }

    public function getGraphicFilterPertahunAction()
    {
      $user = new ViewHistoryPertahun();
      $Kode = '%';
      if (!empty($_POST["Kode"])) {
         $Kode = $this->request->getPost("Kode");
      }
      //$json_data = $akun->getData();
      if ($Kode != '') {
         $json_data = $user->graphicFilter($Kode);
      } else {
         $json_data = $user->getDataGraphic();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
      die(json_encode($json_data));
    }

}

