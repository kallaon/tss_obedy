<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 25. 2. 2019
 * Time: 14:50
 */
require_once 'Providers/DataProvider.php';

class Portofino {
    private $URL_PORTOFINO = 'http://www.portofino-restaurant.sk/';
    private $HTML;
    private $menu = array();

    /**
     * Academus constructor.
     */
    public function __construct()
    {
        $dataProvider = new DataProvider($this->URL_PORTOFINO);
        $this->HTML = $dataProvider->getContent();
        $this->getMenus($this->HTML);
    }

    public function getMenus($HTML_code)
    {
        //menu všetky
        $regex = "/<span style=\"text-align: left\"><p>(.*?)<\/p><\/span>/";
        preg_match_all ($regex, $HTML_code,$match);
        $selectedMatch = $match[0];

        //menu jednotlivo
        $reg_menu = "/<p>(.*?)<br><\/p>/";
        preg_match_all ($reg_menu, $selectedMatch[0], $match_dish);
        $result = $match_dish[1];

        //polievka
        $reg_polievka = "/<b>(.*?)<\/b><\/p><p>(.*)/";
        preg_match_all ($reg_polievka, $result[0], $match_soup);
        $result_soup = $match_soup[2];

        //polievka
        $this->menu[0] = $result_soup[0];

        //menu1
        $this->menu[1] = $result[1];

        //menu2
        $this->menu[2] = $result[2];

        //menu3
        $this->menu[3] = $result[3];

        //menu4
        $this->menu[4] = $result[4];
    }

    /**
     * @return array
     */
    public function getPortofinoMenu()
    {
        return $this->menu;
    }
}







