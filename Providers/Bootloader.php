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
require_once 'DataController.php';

class Bootloader
{
    private $portofino_menu = array();
    private $academus_menu  = array();
    private $fanusik_menu   = array();
    private $dataController;
    private $portofino;
    private $academus;
    private $fanusik;

    public function __construct()
    {
        $this->dataController = new DataController();
        $this->portofino = new Portofino();
        $this->academus = new Academus();
        $this->fanusik = new Fanusik();
    }

    public function populateDB()
    {
        try {
           $this->dataController->addFoodsToDatabase($this->portofino->getPortofinoMenu(),get_class($this->portofino));
           $this->dataController->addFoodsToDatabase($this->academus->getAcademusMenu(),get_class($this->academus));
           $this->dataController->addFoodsToDatabase($this->fanusik->getAcademusMenu(),get_class($this->fanusik));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function getMenusFromDB()
    {
        try {
            $this->portofino_menu = $this->dataController->getMenu(get_class($this->portofino));
            $this->academus_menu = $this->dataController->getMenu(get_class($this->academus));
            $this->fanusik_menu = $this->dataController->getMenu(get_class($this->fanusik));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    /**
     * @return array
     */
    public function getPortofinoMenu()
    {
        return $this->portofino_menu;
    }

    /**
     * @return array
     */
    public function getAcademusMenu()
    {
        return $this->academus_menu;
    }

    /**
     * @return array
     */
    public function getFanusikMenu()
    {
        return $this->fanusik_menu;
    }
}