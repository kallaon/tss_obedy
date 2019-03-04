<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 25. 2. 2019
 * Time: 14:50
 */
require_once 'Providers/DataProvider.php';

class Koleno {
    private $URL_KOLENO = 'http://ukolena.sk/denne-menu/';
    private $HTML;
    private $menu = array();
    private $day = "";
    private $nextDay = "";

    /**
     * Academus constructor.
     */
    public function __construct()
    {
        $dataProvider = new DataProvider($this->URL_KOLENO);
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
                $this->day =      "#masthead";
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
                $this->nextDay =  "#primary";
                break;
            default:
                $this->day =      "#masthead";
                $this->nextDay =  "PONDELOK";
        }
    }

    public function getMenus($HTML_code)
    {
        //menu všetky
        $regex = "/<!-- " . $this->day . " -->(.*?)<!-- " . $this->nextDay . " -->/s";
        preg_match_all ($regex, $HTML_code,$match);
        $selectedMatch = $match[1];

        //polievka
        $regex2 = "/<div class=\"col-xs-12\">(.*?)<\/div>/s";
        preg_match_all ($regex2, implode($selectedMatch),$match);
        $tmp = array_values($match[1]);
        $trimmedArray = array_map('trim', $tmp);
        $emptyRemoved = array_filter($trimmedArray);

        //menu jednotlivo
        $reg_menu = "/<div class=\"nazov\">(.*?)<\/div>/";
        preg_match_all ($reg_menu, implode($selectedMatch), $match_dish);
        $result = $match_dish[1];
        //pridanie polievky
        array_unshift($result,$emptyRemoved[1]);

        $this->menu = array_values($result);
    }

    /**
     * @return array
     */
    public function getKolenoMenu()
    {
        if (!empty($this->menu)){
            return $this->menu;
        } else {
            return array();
        }
    }
}






