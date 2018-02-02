<?php

class GraphicHistoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("GraphicHistory/index");
    }

    public function getGraphicHistoryAction()
    {
        $data = new ViewHistoryPerbulan();
        $json_data = $data->getDataGraphic();
        die(json_encode($json_data));
    }

}

