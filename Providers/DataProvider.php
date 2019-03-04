<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 25. 2. 2019
 * Time: 15:52
 */

class DataProvider {
    private $URL;
    private $content;

    public function __construct($URL)
    {
        $this->content = $this->downloadHTML($URL);
        $this->URL = $URL;
    }

    private function downloadHTML($URL)
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "spider", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks 
        );

        $ch      = curl_init( $URL);
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        curl_close( $ch );

        return $content;
    }

    /**
     * @return mixed
     */
    public function getURL()
    {
        return $this->URL;
    }

    /**
     * @return bool|string
     */
    public function getContent()
    {
        return $this->content;
    }


}