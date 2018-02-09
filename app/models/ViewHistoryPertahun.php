<?php

class ViewHistoryPertahun extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(type="string", length=4, nullable=true)
     */
    public $Tahun;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=false)
     */
    public $Kode;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $Kategori;

    /**
     *
     * @var double
     * @Column(type="double", length=32, nullable=true)
     */
    public $Nominal;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qodr");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'view_history_pertahun';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ViewHistoryPertahun[]|ViewHistoryPertahun
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ViewHistoryPertahun
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getDataHistory()
    {
        $requestData = $_REQUEST;
        $filterAkun = $akun;
        // echo "<pre>".print_r($_REQUEST)."</pre>";
        $requestSearch = strtoupper($_REQUEST['search']['value']);
        $columns = array(
            0 => 'Tahun',
            1 => 'Kode',
            2 => 'Kategori',
            3 => 'Nominal'
        );
        $sql = "SELECT * FROM ViewHistoryPertahun";
        $query = $this->modelsManager->executeQuery($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;
        $no = $_REQUEST['start']+1;
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        if(!empty($requestSearch)) {
            //function mencari data user
            $sql = "SELECT * FROM ViewHistoryPertahun WHERE Tahun LIKE '%".$requestSearch."%'";
            $sql.= "OR Kode LIKE '%".$requestSearch."%'";
            $sql.= "OR Kategori LIKE '%".$requestSearch."%'";
            $sql.= "OR Nominal LIKE '%".$requestSearch."%'";
            $query = $this->modelsManager->executeQuery($sql);
            $totalFiltered = count($query);
            
            $sql.=" ORDER BY ". $columns[$_REQUEST['order'][0]['column']]."   ".$_REQUEST['order'][0]['dir']."   LIMIT ".$_REQUEST['start']." ,".$_REQUEST['length']."   "; 
            $query = $this->modelsManager->executeQuery($sql);
        } else {
            //function menampilkan seluruh data
            $sql = "SELECT * FROM ViewHistoryPertahun limit  $start,$length";
            $query = $this->modelsManager->executeQuery($sql);
        }
        $data = array();
        foreach($query as $key => $value) {
            $dataKeuHarian = array();
            $dataKeuHarian[] = $no;
            $dataKeuHarian[] = $value->Tahun;
            $dataKeuHarian[] = $value->Kode;
            $dataKeuHarian[] = $value->Kategori;
            $dataKeuHarian[] = $value->Nominal;
            $data[] = $dataKeuHarian;
            $no++;
        }
        $json_data = array(
                "draw" => intval($_REQUEST['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data,
        );
        return $json_data;
    }

     public function filter($Kode)
    {
       $akunnya = $Kode;
       $sql = "SELECT * FROM ViewHistoryPertahun WHERE Kode LIKE '$akunnya'";
       $query = $this->modelsManager->executeQuery($sql);
       $data = array();
       $no = $requestData['start']+1;
       
       foreach($query as $key => $value) {
          $dataAkun = array();
          $dataAkun[] = $no;
          $dataAkun[] = $value->Tahun;
          $dataAkun[] = $value->Kode;
          $dataAkun[] = $value->Kategori;
          $dataAkun[] = $value->Nominal;
          $data[] = $dataAkun;
          $no++;
       }
       $json_data = array(
          "draw"            => intval( $requestData['draw'] ),
          "recordsTotal"    => intval( $totalData ),
          "recordsFiltered" => intval( $totalFiltered ),
          "data"            => $data
       );
       return $json_data;
    }

    public function getDataGraphic()
    {
       $sql = "SELECT * FROM ViewHistoryPertahun LIMIT 10";
       $query = $this->modelsManager->executeQuery($sql);

       $data = array();
        
        foreach ($query as $key => $value) {
            $dataUser = array();
            $tanggal = $value->Tahun;
            $dataUser['tanggal'] = $tanggal;
            $dataUser['nominal'] = $value->Nominal;
          
            $data[] = $dataUser;
        }
                
        return $data; 
    }

    public function graphicFilter($Kode)
    {
       $akunnya = $Kode;
       $sql = "SELECT * FROM ViewHistoryPertahun WHERE Kode LIKE '$akunnya' LIMIT 10";
       $query = $this->modelsManager->executeQuery($sql);
       $data = array();
       
       foreach($query as $key => $value) {
          $dataAkun = array();
          $tanggal = $value->Tahun;
          $dataAkun['tanggal'] = $value->Tahun;
          $dataAkun['nominal'] = $value->Nominal;
          
          $data[] = $dataAkun;
       }

       return $data;
    }

}
