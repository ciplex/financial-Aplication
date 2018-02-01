<?php

class KeuHarian extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="id", type="string", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="cabang_id", type="string", length=3, nullable=false)
     */
    public $cabang_id;

    /**
     *
     * @var string
     * @Column(column="tanggal", type="string", nullable=false)
     */
    public $tanggal;

    /**
     *
     * @var string
     * @Column(column="nama_barang", type="string", length=64, nullable=false)
     */
    public $nama_barang;

    /**
     *
     * @var string
     * @Column(column="akun_id", type="string", length=3, nullable=false)
     */
    public $akun_id;

    /**
     *
     * @var integer
     * @Column(column="jml_barang", type="integer", length=3, nullable=false)
     */
    public $jml_barang;

    /**
     *
     * @var integer
     * @Column(column="harga_satuan", type="integer", length=11, nullable=false)
     */
    public $harga_satuan;

    /**
     *
     * @var string
     * @Column(column="satuan_barang_id", type="string", length=8, nullable=false)
     */
    public $satuan_barang_id;

    /**
     *
     * @var integer
     * @Column(column="total_harga", type="integer", length=11, nullable=false)
     */
    public $total_harga;

    /**
     *
     * @var integer
     * @Column(column="debit", type="integer", length=11, nullable=false)
     */
    public $debit;

    /**
     *
     * @var integer
     * @Column(column="kredit", type="integer", length=11, nullable=false)
     */
    public $kredit;

    /**
     *
     * @var string
     * @Column(column="keterangan", type="string", nullable=false)
     */
    public $keterangan;

    /**
     *
     * @var string
     * @Column(column="pelaku", type="string", length=16, nullable=false)
     */
    public $pelaku;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qodr");
        $this->setSource("keu_harian");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'keu_harian';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return KeuHarian[]|KeuHarian|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return KeuHarian|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getData() 
    {

       $requestData = $_REQUEST;

       $sql   = "SELECT h.*, a.*, u.* FROM KeuHarian h, RefAkun a, RefUser u WHERE h.akun_id = a.id AND h.pelaku = u.username ORDER BY h.id DESC";
       $query = $this->modelsManager->executeQuery($sql);

       $data  = array();
       $no    = $requestData['start']+1;

       foreach($query as $key => $value) {
          $dataKeuHarian   = array();
          $dataKeuHarian[] = $no;
          $dataKeuHarian[] = $value->h->cabang_id;
          $dataKeuHarian[] = $value->h->tanggal;
          $dataKeuHarian[] = $value->h->nama_barang;
          $dataKeuHarian[] = $value->a->nama;
          $dataKeuHarian[] = $value->h->jml_barang;
          $dataKeuHarian[] = $value->h->harga_satuan;
          $dataKeuHarian[] = $value->h->satuan_barang_id;
          $dataKeuHarian[] = $value->h->total_harga;
          $dataKeuHarian[] = $value->h->debit;
          $dataKeuHarian[] = $value->h->kredit;
          $dataKeuHarian[] = $value->h->keterangan;
          $dataKeuHarian[] = $value->u->username;

          $data[] = $dataKeuHarian;
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
