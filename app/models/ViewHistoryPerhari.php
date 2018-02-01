<?php

class ViewHistoryPerhari extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(column="Hari", type="string", length=72, nullable=true)
     */
    public $hari;

    /**
     *
     * @var string
     * @Column(column="Kode", type="string", length=3, nullable=false)
     */
    public $kode;

    /**
     *
     * @var string
     * @Column(column="Kategori", type="string", length=16, nullable=false)
     */
    public $kategori;

    /**
     *
     * @var double
     * @Column(column="Nominal", type="double", length=32, nullable=true)
     */
    public $nominal;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qodr");
        $this->setSource("view_history_perhari");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'view_history_perhari';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ViewHistoryPerhari[]|ViewHistoryPerhari|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ViewHistoryPerhari|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getDataHistory()
    {
        $requestData = $_REQUEST;
        // echo "<pre>".print_r($_REQUEST)."</pre>";
        $requestSearch = strtoupper($_REQUEST['search']['value']);
        $columns = array(
            0 => 'Hari',
            1 => 'Kode',
            2 => 'Kategori',
            3 => 'Nominal'
        );
        $sql = "SELECT * FROM ViewHistoryPerhari";
        $query = $this->modelsManager->executeQuery($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;
        $no = $_REQUEST['start']+1;
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        if(!empty($requestSearch)) {
            //function mencari data user
            $sql = "SELECT * FROM ViewHistoryPerhari WHERE Hari LIKE '%".$requestSearch."%'";
            $sql.= "OR Kode LIKE '%".$requestSearch."%'";
            $sql.= "OR Kategori LIKE '%".$requestSearch."%'";
            $sql.= "OR Nominal LIKE '%".$requestSearch."%'";
            $query = $this->modelsManager->executeQuery($sql);
            $totalFiltered = count($query);
            
            $sql.=" ORDER BY ". $columns[$_REQUEST['order'][0]['column']]."   ".$_REQUEST['order'][0]['dir']."   LIMIT ".$_REQUEST['start']." ,".$_REQUEST['length']."   "; 
            $query = $this->modelsManager->executeQuery($sql);
        } else {
            //function menampilkan seluruh data
            $sql = "SELECT * FROM ViewHistoryPerhari limit $start,$length";
            $query = $this->modelsManager->executeQuery($sql);
        }
        $data = array();
        foreach($query as $key => $value) {
            $dataKeuHarian = array();
            $dataKeuHarian[] = $no;
            $dataKeuHarian[] = $value->Hari;
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
}
