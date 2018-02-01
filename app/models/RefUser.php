<?php

class RefUser extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(column="id", type="string", length=16, nullable=false)
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
     * @Column(column="username", type="string", length=32, nullable=false)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=32, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(column="type", type="string", length=32, nullable=false)
     */
    public $type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qodr");
        $this->setSource("ref_user");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ref_user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RefUser[]|RefUser|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RefUser|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getData() 
    {

       $requestData = $_REQUEST;

       $sql = "SELECT * FROM RefUser";
       $query = $this->modelsManager->executeQuery($sql);

       $data = array();
       $no = $requestData['start']+1;

       foreach($query as $key => $value) {
          $dataUser = array();
          $dataUser[] = $no;
          $dataUser[] = $value->cabang_id;
          $dataUser[] = $value->username;
          $dataUser[] = $value->password;

          $data[] = $dataUser;
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
