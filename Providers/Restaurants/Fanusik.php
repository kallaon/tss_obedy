<?php
/**
 * Created by PhpStorm.
 * User: DanielJežík
 * Date: 25.2.2019
 * Time: 21:13
 */

require_once 'Providers/DataProvider.php';

class Fanusik {
    private $URL_FANUSIK = 'https://restauracie.sme.sk/restauracia/restauracia-fanusik_4551-dubnica-nad-vahom_3095/denne-menu';
    private $HTML;
    private $menu = array();
    private $currentMenuByDay = array();

    /**
     * Academus constructor.
     */
    public function __construct()
    {
        $dataProvider = new DataProvider($this->URL_FANUSIK);
        $this->HTML = $dataProvider->getContent();
        $this->getMenus($this->HTML);
    }


    public function getMenus($HTML_code)
    {
        //menu všetky
        $regex2 = "/<div class=\"left\">(.*?)<\/div>/s";
        preg_match_all ($regex2, $this->HTML,$match);

        //polievka
        $trimmedArray = array_map('trim', array_values($match[1]));
        $emptyRemoved = array_filter($trimmedArray);

        $foods = array();
        foreach ($match[1] as $item) {
            $tmp = trim($item);

            if ((strcmp(substr($tmp,1,1),".") == 0 ) && intval(substr($tmp,0,1)) > 0  && !strpos($tmp,'€'))
            {
                //echo $tmp;
                array_push($foods,$tmp);
            }
        }
        array_unshift($foods,$emptyRemoved[2]);
        $this->arraySlicer($foods);
    }

    public function arraySlicer($menu)
    {
        $num = intval(substr($menu[6],0,1));
        if ($num == 7)
        {
            $this->menu = array_values(array_slice($menu,0,8,true));
        } elseif ($num == 6) {
            $this->menu = array_values(array_slice($menu,0,7,true));
        }
    }

    /**
     * @return array
     */
    public function getMenu()
    {
        return $this->menu;
    }
}







