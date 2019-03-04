<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 25. 2. 2019
 * Time: 14:50
 */
require_once 'Providers/DataProvider.php';

class Bistro {
    private $URL_PORTOFINO = 'http://bistro33.eu/obedove-menu/';
    private $HTML;
    private $menu = array();
    private $day = "";
    private $nextDay = "";

    /**
     * Academus constructor.
     */
    public function __construct()
    {
        $dataProvider = new DataProvider($this->URL_PORTOFINO);
        $this->HTML = $dataProvider->getContent();
        $this->determineDays();
        $this->getMenus($this->HTML);
    }

    private function determineDays()
    {

        $valueOfDay = date('N', time());
        switch ($valueOfDay)
        {
            case 0:
                $this->day =      "NEDELA";
                $this->nextDay =  "PONDELOK";
                break;
            case 1:
                $this->day =      "PONDELOK";
                $this->nextDay =  "UTOROK";
                break;
            case 2:
                $this->day =      "UTOROK";
                $this->nextDay =  "STREDA";
                break;
            case 3:
                $this->day =      "STREDA";
                $this->nextDay =  "STVRTOK";
                break;
            case 4:
                $this->day =      "STVRTOK";
                $this->nextDay =  "PIATOK";
                break;
            case 5:
                $this->day =      "PIATOK";
                $this->nextDay =  "SOBOTA";
                break;
            default:
                $this->day =      "NEDELA";
                $this->nextDay =  "PONDELOK";
        }
    }

    public function getMenus($HTML_code)
    {
        //menu všetky
        $regex = "/<!-- " . $this->day . " -->(.*?)<!-- " . $this->nextDay . " -->/s";
        preg_match_all ($regex, $HTML_code,$match);
        $selectedMatch = $match[1];

        //menu jednotlivo
        $reg_menu = "/<div class=\"col-xs-12 col-sm-5\">(.*?)<\/div>/";
        preg_match_all ($reg_menu, implode($selectedMatch), $match_dish);
        $result = $match_dish[1];

        $this->menu = array_values($result);
    }

    /**
     * @return array
     */
    public function getBistroMenu()
    {
        if (!empty($this->menu)){
            return $this->menu;
        } else {
            return array();
        }
    }
}






