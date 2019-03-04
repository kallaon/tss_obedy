<?php
/**
 * Created by PhpStorm.
 * User: DanielJežík
 * Date: 26.2.2019
 * Time: 20:06
 */
require_once 'Restaurants/Academus.php';
require_once 'Restaurants/Portofino.php';
require_once 'Restaurants/Fanusik.php';
require_once 'Restaurants/Bistro.php';
require_once 'Restaurants/Koleno.php';
require_once 'DataController.php';

class Bootloader
{
    private $portofino_menu = array();
    private $academus_menu  = array();
    private $fanusik_menu   = array();
    private $bistro_menu   = array();
    private $koleno_menu   = array();
    private $dataController;
    private $portofino;
    private $academus;
    private $fanusik;
    private $bistro;
    private $koleno;

    public function __construct()
    {
        $this->dataController = new DataController();
        $this->portofino = new Portofino();
        $this->academus = new Academus();
        $this->fanusik = new Fanusik();
        $this->bistro = new Bistro();
        $this->koleno = new Koleno();
    }

    public function init()
    {
        try {

        } catch (Exception $exception)
        {
            print_r($exception);
        }
    }

    public function populateDB()
    {
        try {
            $this->dataController->addFoodsToDatabase($this->portofino->getPortofinoMenu(),get_class($this->portofino));
            $this->dataController->addFoodsToDatabase($this->academus->getAcademusMenu(),get_class($this->academus));
            $this->dataController->addFoodsToDatabase($this->fanusik->getMenu(),get_class($this->fanusik));
            $this->dataController->addFoodsToDatabase($this->bistro->getBistroMenu(),get_class($this->bistro));
            $this->dataController->addFoodsToDatabase($this->koleno->getKolenoMenu(),get_class($this->koleno));
        } catch (Exception $e) {
            //print_r($e);
        }
    }

    public function getMenusFromDB()
    {
        try {
            $this->portofino_menu = $this->dataController->getMenu(get_class($this->portofino));
            $this->academus_menu = $this->dataController->getMenu(get_class($this->academus));
            $this->fanusik_menu = $this->dataController->getMenu(get_class($this->fanusik));
            $this->bistro_menu = $this->dataController->getMenu(get_class($this->bistro));
            $this->koleno_menu = $this->dataController->getMenu(get_class($this->koleno));
        } catch (Exception $e) {
            //print_r($e);
        }
    }

    public function truncateDB()
    {
        try {
            $this->dataController->truncateDB(get_class($this->portofino));
            $this->dataController->truncateDB(get_class($this->academus));
            $this->dataController->truncateDB(get_class($this->fanusik));
            $this->dataController->truncateDB(get_class($this->bistro));
            $this->dataController->truncateDB(get_class($this->koleno));
        } catch (Exception $e) {
            //print_r($e);
        }
    }

    /**
     * @return array
     */
    public function getPortofinoMenu()
    {
        if (!empty($this->portofino_menu)){
            return $this->portofino_menu;
        } else {
            return array();
        }
    }

    /**
     * @return array
     */
    public function getAcademusMenu()
    {
        if (!empty($this->academus_menu)){
            return $this->academus_menu;
        } else {
            return array();
        }
    }

    /**
     * @return array
     */
    public function getFanusikMenu()
    {
        if (!empty($this->fanusik_menu)){
            return $this->fanusik_menu;
        } else {
            return array();
        }
    }

    public function getBistroMenu()
    {
        if (!empty($this->bistro_menu)){
            return $this->bistro_menu;
        } else {
            return array();
        }
    }
    public function getKolenoMenu()
    {
        if (!empty($this->koleno_menu)){
            return $this->koleno_menu;
        } else {
            return array();
        }
    }

}