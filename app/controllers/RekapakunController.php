<?php

class RekapakunController extends \Phalcon\Mvc\Controller
{

   public function indexAction()
   {

   }

   public function getAjaxAction()
   {
      $akun = new RefAkun();
      $Bulan = '%';
      if (!empty($_POST["Bulan"])) {
         $Bulan = $this->request->getPost("Bulan");
      }

      $Tahun = '%';
      if (!empty($_POST["Tahun"])) {
         $Tahun = $this->request->getPost("Tahun");
      }

      //$json_data = $akun->getData();
      if ($Bulan != '') {
         $json_data = $akun->filter($Bulan, $Tahun);
      } else {
         $json_data = $akun->getData();
      }
      //echo "Bulan :".$Bulan;
      //echo "Tahun :".$Tahun;
      //$this->view->pick("rekapakun/getAjax");
      //$this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);

      die(json_encode($json_data));
   }

}

