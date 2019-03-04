<?php
/**
 * Created by PhpStorm.
 * User: djezik
 * Date: 1. 3. 2019
 * Time: 13:05
 */

require_once 'Providers/Bootloader.php';

$bootloader = new Bootloader();

//init
$bootloader->init();

//turncate DB
$bootloader->truncateDB();

//populate DB
$bootloader->populateDB();