<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 25. 2. 2019
 * Time: 14:50
 */
require_once 'Providers/DataProvider.php';

class Academus {
    private $URL_ACADEMUS = 'http://academus.sk/denne-menu/';
    private $HTML;
    private $menu = array();

    /**
     * Academus constructor.
     */
    public function __construct()
    {
        $dataProvider = new DataProvider($this->URL_ACADEMUS);
        $this->HTML = $dataProvider->getContent();
        $this->getMenus($this->HTML);
    }

    public function getMenus($HTML_code)
    {
        //polievka
        $reg_polievka = "/<div class=\"col-xs-12 col-sm-12 col-md-8 jedlo polievka\">(.*?)<\/div>/";
        preg_match_all ($reg_polievka, $HTML_code,$match);
        $this->menu[0] = $match[1];

        //menu1
        $reg_menu1 = "/<div class=\"col-xs-12 col-sm-12 col-md-8 jedlo menu 1\">(.*?)<\/div>/";
        preg_match_all ($reg_menu1, $HTML_code, $match);
        $this->menu[1] = $match[1];

        //menu2
        $reg_menu2 = "/<div class=\"col-xs-12 col-sm-12 col-md-8 jedlo menu 2\">(.*?)<\/div>/";
        preg_match_all ($reg_menu2, $HTML_code, $match);
        $this->menu[2] = $match[1];

        //menu3
        $reg_menu3 = "/<div class=\"col-xs-12 col-sm-12 col-md-8 jedlo menu 3\">(.*?)<\/div>/";
        preg_match_all ($reg_menu3, $HTML_code, $match);
        $this->menu[3] = $match[1];

        //menu4
        $reg_menu4 = "/<div class=\"col-xs-12 col-sm-12 col-md-8 jedlo menu 4\">(.*?)<\/div>/";
        preg_match_all ($reg_menu4, $HTML_code, $match);
        $this->menu[4] = $match[1];
    }

    /**
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }
}








