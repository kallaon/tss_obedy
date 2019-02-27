<?php
/**
 * Created by PhpStorm.
 * User: DanielJežík
 * Date: 25.2.2019
 * Time: 21:13
 */

require_once 'Providers/DataProvider.php';

class Fanusik {
//    private $URL_FANUSIK = 'http://www.restauraciafanusik.sk/menu.html';
    private $URL_FANUSIK = 'https://restauracie.sme.sk/restauracia/restauracia-fanusik_4551-dubnica-nad-vahom_3095/denne-menu';
    private $HTML;
    private $menu = array();
    private $menuByDay = array();

    /**
     * Academus constructor.
     */
    public function __construct()
    {
        $dataProvider = new DataProvider($this->URL_FANUSIK);
        $this->HTML = $dataProvider->getContent();
        $this->getMenus($this->HTML);
        $this->getMenuByCurrentDay();
    }

    public function getMenus($HTML_code)
    {
        //menu všetky
        $regex = "/<h3 class=\"erm_product_title\"><span>(.*?)<\/span><span class=\"dotted\"><\/span><\/h3>/";
        preg_match_all ($regex, $HTML_code,$match);
        $policko = $match[0];
        $temp = $match[1];
        $results = array();
        $menu1 = array();
        $menu2 = array();
        $menu3 = array();
        $menu4 = array();
        $menu5 = array();
        $menu6 = array();
        $menu7 = array();

        foreach ($temp as $item) {
            array_push($results,strip_tags($item));
        }

        $id = array(0,1,8,9,17,18,26,27,35,36);
        foreach ($id as $item) {
            unset($results[$item]);
        }
        $results = array_values($results);

//        //menu jednotlivo
//        $reg_menu = "/<p>(.*?)<br><\/p>/";
//        preg_match_all ($reg_menu, $policko[0], $match_dish);
////        var_dump($match_dish);
//
//        //polievka
//        $reg_polievka = "/<b>(.*?)<\/b><\/p><p>(.*)/";
//        preg_match_all ($reg_polievka, $result[0], $match_soup);
//        $result_soup = $match_soup[2];




        //polievka
        $refg = "/<div class=\"left\">(.*?)<\/div>/s";
        preg_match_all ($refg, $this->HTML, $matcher);
        $sides = array();
        foreach ($matcher[1] as $item) {
            $item = trim($item);
            if (!empty($item) && $item != null){
                array_push($sides,$item);
            }
        }
        //var_dump($sides);
//die();
//        echo $results[7] . "<br>";
//        echo substr(trim($results[7]),0,1) . "<br>";
//        echo intval(substr(trim($results[7]),0,1)) . "<br>";
        foreach ($results as $item) {
            $num = intval(substr(trim($item),0,1));
            switch ($num)
            {
                case 1:
                    array_push($menu1, $item);
                    break;
                case 2:
                    array_push($menu2, $item);
                    break;
                case 3:
                    array_push($menu3, $item);
                    break;
                case 4:
                    array_push($menu4, $item);
                    break;
                case 5:
                    array_push($menu5, $item);
                    break;
                case 6:
                    array_push($menu6, $item);
                    break;
                case 7:
                    array_push($menu7, $item);
                    break;
            }
        }
        $this->menu[0] = array();
        $this->menu[1] = $menu1;
        $this->menu[2] = $menu2;
        $this->menu[3] = $menu3;
        $this->menu[4] = $menu4;
        $this->menu[5] = $menu5;
        $this->menu[6] = $menu6;
        $this->menu[7] = $menu7;

    }

    /**
     * @return array
     */
    public function getAcademusMenu()
    {
        return $this->menuByDay;
    }

    private function getMenuByCurrentDay()
    {
        $tmp_menu = array();
        $valueOfDay = date('N', time())-1;
        foreach ($this->menu as $item)
        {
            try {
                array_push($tmp_menu,$item[$valueOfDay]);
            } catch (Exception $exception)
            {
                print_r($exception);
            }
        }
        $this->menuByDay = array_values($tmp_menu);
    }

    public function disck()
    {

    }

}







