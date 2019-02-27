<?php
/**
 * Created by PhpStorm.
 * User: DanielJežík
 * Date: 25.2.2019
 * Time: 19:32
 */
header("Content-Type: text/html; charset=utf-8");

require_once 'Providers/DataController.php';
require_once 'Providers/Bootloader.php';

$bootloader = new Bootloader();
//$bootloader->populateDB();

$bootloader->getMenusFromDB();

$menu_portofino = $bootloader->getPortofinoMenu();
$menu_academus = $bootloader->getAcademusMenu();
//$menu_fanusik = $bootloader->getFanusikMenu();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Obedové menu</title>
</head>
<body>
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQda2p4d-UcemWeQvhr-kFyW1YGFuVd94r1Rvln1cKJG3Ss37Rkxg" alt="" width="72" height="72">
        <h2>Obedové menu</h2>
        <p class="lead">
            <blockquote class="blockquote">
        <p class="mb-0">Sýty hladnému neverí.</p>
        <footer class="blockquote-footer">niekto známy <cite title="Source Title"><a href="https://sk.wikiquote.org/wiki/Jedlo"> Wiki</a></cite></footer>
        </blockquote>
        </p>
    </div>

    <!--        PORTOFINO MENU-->
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    Portofino
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($menu_portofino as $item) {
                            echo '<li class="list-group-item">' . $item . "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--        ACADEMUS MENU-->
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    ACADEMUS
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($menu_academus as $item) {
                            echo '<li class="list-group-item">' . $item . "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--        FANUSIK MENU-->
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    FANÚŠIK
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($menu_fanusik as $item) {
                            echo '<li class="list-group-item">' . $item . "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>