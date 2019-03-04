<?php
/**
 * Created by PhpStorm.
 * User: DanielJežík
 * Date: 25.2.2019
 * Time: 19:32
 */
header("Content-Type: text/html; charset=utf-8");

// Turn off all error reporting
//error_reporting(0);

require_once 'Providers/DataController.php';

$dataController = new DataController();

$menu_portofino = $dataController->getMenu(Portofino::class);
$menu_academus = $dataController->getMenu(Academus::class);
$menu_fanusik = $dataController->getMenu(Fanusik::class);
$menu_bistro = $dataController->getMenu(Bistro::class);
$menu_koleno = $dataController->getMenu(Koleno::class);

?>

<!doctype html>
<html lang="sk">
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
        <h2>Obedové menu</h2><kbd> v.1.2</kbd>
        <p class="lead">
            <blockquote class="blockquote">
        <p class="mb-0">"Neverím ti jak neverí hladnému sýty."</p>
        <footer class="blockquote-footer">Majk Spirit <cite title="Source Title"><a href="https://youtu.be/PyrLVTwaaV8?t=115" target="_blank"> H16 - Neverím ti</a></cite></footer>
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
                        if (!empty($menu_portofino))
                        {
                            for ($i = 0; $i < count($menu_portofino); $i++)
                            {
                                if ($i == 0)
                                {
                                    echo '<li class="list-group-item list-group-item-info"><b>Polievka: </b>' . $menu_portofino[$i] . "</li>";
                                } else {
                                    echo '<li class="list-group-item">' . $menu_portofino[$i] . "</li>";
                                }
                            }
                        } else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Chýba obedové menu</div>";
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
                        if (!empty($menu_academus))
                        {
                            $menu = 0;
                            foreach ($menu_academus as $item) {
                                if ($menu == 0)
                                {
                                    echo '<li class="list-group-item list-group-item-info"><b>Polievka: </b>' . $item . "</li>";
                                }else {
                                    echo '<li class="list-group-item">' . $menu . ". " . $item . "</li>";
                                }
                                $menu++;
                            }
                        } else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Chýba obedové menu</div>";
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
                        if (!empty($menu_fanusik))
                        {
                            $menu = 0;
                            foreach ($menu_fanusik as $item) {
                                if ($menu == 0)
                                {
                                    echo '<li class="list-group-item list-group-item-info"><b>Polievka: </b>' . $item . "</li>";
                                }else {
                                    echo '<li class="list-group-item">' . $item . "</li>";
                                }
                                $menu++;
                            }
                        } else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Chýba obedové menu</div>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--        BISTRO MENU-->
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    BISTRO33
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        $menu = 1;
                        foreach ($menu_bistro as $item) {
                            echo '<li class="list-group-item">' .$menu . ". ". $item . "</li>";
                            $menu++;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--        KOLENO MENU-->
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    u KOLENA
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        if (!empty($menu_koleno))
                        {
                            $menu = 0;
                            foreach ($menu_koleno as $item) {
                                if ($menu == 0) {
                                    echo '<li class="list-group-item list-group-item-info"><b>Polievka: </b>' . $item . "</li>";
                                } else {
                                    echo '<li class="list-group-item">' . $menu . ". " . $item . "</li>";
                                }
                                $menu++;
                            }
                        } else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Chýba obedové menu</div>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--FOOTER-->
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 DANIEL JEŽÍK</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="https://github.com/kallaon">GitHub</a></li>
            <li class="list-inline-item"><a href="https://www.toplist.sk"><script language="JavaScript" type="text/javascript">
                        <!--
                        document.write('<img src="https://toplist.sk/count.asp?id=1270473&logo=mc&http='+
                            escape(document.referrer)+'&t='+escape(document.title)+
                            '&wi='+escape(window.screen.width)+'&he='+escape(window.screen.height)+'&cd='+
                            escape(window.screen.colorDepth)+'" width="88" height="60" border=0 alt="TOPlist" />');
                        //--></script><noscript><img src="https://toplist.sk/count.asp?id=1270473&logo=mc" border="0"
                                                     alt="TOPlist" width="88" height="60" /></noscript></a></li>
        </ul>
    </footer>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135431948-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-135431948-1');
</script>
</body>
</html>