<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 26. 2. 2019
 * Time: 14:32
 */

require_once 'Providers/Restaurants/Academus.php';
require_once 'Providers/Restaurants/Portofino.php';
require_once 'Providers/Restaurants/Fanusik.php';
require_once 'Database/MyPDO.php';

class DataController
{
    private $PDO;

    public function __construct()
    {
        try {
            $this->PDO = new MyPDO();
        } catch (exception $e) {
            print_r(e);
        }
    }

    public function addFoodsToDatabase($arrayOfFoods, $class)
    {
        foreach ($arrayOfFoods as $food) {
            $this->PDO->addFoodByClass($food ,$class);
        }
    }

    public function getMenu($class)
    {
        return $this->PDO->getMenuByClass($class);
    }


/*$academus = new Academus();
$menu_academus = $academus->getMenu();

$portofino = new Portofino();
$menu_portofino = $portofino->getMenu();

$fanusik = new Fanusik();
$pole2 = $fanusik->getMenu();*/
}

