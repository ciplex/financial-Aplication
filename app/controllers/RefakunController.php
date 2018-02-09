<?php

class RefakunController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

      // $data_RefAkun = RefAkun::find();
      // foreach($data_RefAkun as $z=>$l){
      //   $sql = "SELECT sum(total_harga) as total FROM KeuHarian 
      //      Where tanggal like '2017-11-%' and akun_id='$l->id'"; 
      //   $query = $this->modelsManager->createQuery($sql);
      //   $nominal  = $query->execute()->toArray();     
      //   echo "$l->id | $l->nama | ".$nominal[0]['total']."<br>";
      // }
      // die();
              
      // $this->view->data_RefAkun = $data_RefAkun;
    }

    public function getAjaxAction()     
    {
      $RefAkun = new RefAkun();
      $json_data = $RefAkun->getDataRefAkun(); //samain penamaan sama di model
      die(json_encode($json_data));
    }

    public function listRefAkunAction()
    {
      $data_RefAkun = RefAkun::find();
      $this->view->data_RefAkun = $data_RefAkun;
    }

    public function getDataAction($id)
    {
      $data_RefAkun = RefAkun::findFirst("id='$id'");
      die(json_encode($data_RefAkun));
    }

}
