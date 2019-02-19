<?php
    //<nn>
    // Ha nem lenne session csinálunk, hogy ne álljunk le hibával
    //</nn>
    session_start();
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/PASZU_MATEK/php/scripts/MAIN_APP.php');

    $pgGnrtr=NEW MAIN_APP();

    $pgGnrtr->updt_Usr_Lastlogin();

    //<nn>
    // Ha volt session, kiürítjük.
    //</nn>
    $_SESSION = array();
    
    //<nn>
    // Az üres session elpusztítjuk.
    //</nn>
    session_destroy();
    
    //<nn>
    // Visszatérünk a bejelentkező lapra.
    //</nn>
    header("location: login.php");
    exit;

?>