<?php

class RekaphistoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function getAjaxeAction()
    {
        $user = new ViewHistoryPerhari();
        $json_data = $user->getDataHistory();
        die(json_encode($json_data));
    }

    public function getAjaxFilterAction()
   {
      $user = new ViewHistoryPerhari();
      $Bulan = '%';
      if (!empty($_POST["Bulan"])) {
         $Bulan = $this->request->getPost("Bulan");
      }
      $Tahun = '%';
      if (!empty($_POST["Tahun"])) {
         $Tahun = $this->request->getPost("Tahun");
      }
      $Kode = '%';
      if (!empty($_POST["Kode"])) {
         $Kode = $this->request->getPost("Kode");
      }
      //$json_data = $akun->getData();
      if ($Bulan != '' OR $Tahun != '' OR $Kode != '') {
         $json_data = $user->filter($Bulan, $Tahun, $Kode);
      } else {
         $json_data = $user->getDataHistory();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
      die(json_encode($json_data));
   }

   
    public function getAjaxPerbulanAction()
    {
        $user = new ViewHistoryPerbulan();
        $json_data = $user->getDataHistory();
        die(json_encode($json_data));
    }

    public function getAjaxFilterPerbulanAction()
   {
      $user = new ViewHistoryPerbulan();
      $Tahun = '%';
      if (!empty($_POST["Tahun"])) {
         $Tahun = $this->request->getPost("Tahun");
      }
      $Kode = '%';
      if (!empty($_POST["Kode"])) {
         $Kode = $this->request->getPost("Kode");
      }
      //$json_data = $akun->getData();
      if ($Tahun != '' OR $Kode != '') {
         $json_data = $user->filter($Tahun, $Kode);
      } else {
         $json_data = $user->getDataHistory();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
      die(json_encode($json_data));
   }

    public function getAjaxPertahunAction()
    {
        $user = new ViewHistoryPertahun();
        $json_data = $user->getDataHistory();
        die(json_encode($json_data));
    }

    public function getAjaxFilterPertahunAction()
   {
      $user = new ViewHistoryPertahun();
      $Kode = '%';
      if (!empty($_POST["Kode"])) {
         $Kode = $this->request->getPost("Kode");
      }
      //$json_data = $akun->getData();
      if ( $Kode != '') {
         $json_data = $user->filter($Kode);
      } else {
         $json_data = $user->getDataHistory();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
      die(json_encode($json_data));
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
      if ( $Kode != '') {
         $json_data = $user->graphicFilter($Kode);
      } else {
         $json_data = $user->getDataGraphic();
      }
      die(json_encode($json_data));
    }

    public function getAjaxAction()
    {
        // $user = new User();
        // $json_data = $user->getDataUser();
        // die(json_encode($json_data));

        $curl = new Helpers();
        $res = $curl->curlget('http://localhost/keu_qodr/rekaphistory/getAjaxPertahun');
        die($res);
    }
}

