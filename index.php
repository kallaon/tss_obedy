<?php
/**
 * Created by PhpStorm.
 * User: DanielJežík
 * Date: 25.2.2019
 * Time: 19:32
 */
require_once 'Providers/Restaurants/Academus.php';
require_once 'Providers/Restaurants/Portofino.php';
require_once 'Providers/Restaurants/Fanusik.php';

header("Content-Type: text/html; charset=utf-8");

//////////////////////////

    $academus = new Academus();
    $pole = $academus->getMenu();

    $portofino = new Portofino();
    $pole1 = $portofino->getMenu();

    $portofino = new Fanusik();
    $pole2 = $portofino->getMenu();
