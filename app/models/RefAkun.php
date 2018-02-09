<?php

class RefAkun extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=3, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $nama;

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
        return 'ref_akun';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RefAkun[]|RefAkun
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RefAkun
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

     public function getDataRefAkun() 
    {
        
        $requestData  = $_REQUEST;
        $requestSearch = strtoupper($requestData['search']['value']);

        $columns = array (
            0 => 'id',
            1 => 'nama',
            // 2 => 'periode',
            2 => 'nominal',
            // 2 => 'password',
            // 3 => 'type',
        );

        $sql = "SELECT * FROM RefAkun";
        $query = $this->modelsManager->executeQuery($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;  
        $no = $requestData['start']+1;
        $start = $requestData['start'];
        $length = $requestData['length'];

        if (!empty($requestSearch)) {
        //function mencari data keuharian
            $sql = "SELECT * FROM KeuHarian WHERE nama_barang LIKE '%".$requestSearch."%'";
            $sql.= "OR cabang_id LIKE '%".$requestSearch."%'";
            $sql.= "OR tanggal LIKE '%".$requestSearch."%'";
            $sql.= "OR akun_id LIKE '%".$requestSearch."%'";
            $sql.= "OR jml_barang LIKE '%".$requestSearch."%'";
            $sql.= "OR harga_satuan LIKE '%".$requestSearch."%'";
            $sql.= "OR satuan_barang_id LIKE '%".$requestSearch."%'";
            $sql.= "OR total_harga LIKE '%".$requestSearch."%'";
            $sql.= "OR debit LIKE '%".$requestSearch."%'";
            $sql.= "OR kredit LIKE '%".$requestSearch."%'";
            $sql.= "OR keterangan LIKE '%".$requestSearch."%'";
            $sql.= "OR pelaku LIKE '%".$requestSearch."%'";
            $query = $this->modelsManager->executeQuery($sql); 
            $totalFiltered = count($query);

            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
            $query = $this->modelsManager->executeQuery($sql); 
        } else {
        //function menampilkan seluruh data
            $sql = "SELECT * FROM RefAkun limit $start,$length";
            $query = $this->modelsManager->executeQuery($sql);
        }
        
        $data = array();
        

        foreach ($query as $key => $value) {
            $dataRefAkun = array();
            $dataRefAkun[] = $no;
            $dataRefAkun[] = $value->id;
            $dataRefAkun[] = $value->nama;
            $dataRefAkun[] = $nominal[0]['total'];

            $data[] = $dataRefAkun;
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
}
