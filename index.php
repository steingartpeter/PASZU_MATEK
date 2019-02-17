<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/PASZU_MATEK/php/scripts/MAIN_APP.php');
    
    session_start();


    $pgGnrtr = new MAIN_APP();

    echo $pgGnrtr->generateBasicSiteHeader();
?>

    <h1>Kezdőoldal - Paszu Matek!</h1>

<?php
    echo $pgGnrtr->generateBasicSiteFooter();
?>
