<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/PASZU_MATEK/php/scripts/MAIN_APP.php');
    

    if(!isset($_SESSION['USR_LGDIN']) || $_SESSION['USR_LGDIN'] == '' ){
        header("location: /PASZU_MATEK/php/session/login.php");
    }else{
        
    }


    $pgGnrtr = new MAIN_APP();

    echo $pgGnrtr->generateBasicSiteHeader();
?>

    <!-- <h1>Kezdőoldal - Paszu Matek!</h1> -->
    
    <div class="row">
    <div class="col-lg-12">
        <h1>KEZDŐLAP KEZDŐLAP KEZDŐLAP KEZDŐLAP KEZDŐLAP KEZDŐLAP </h1>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <p>
            <div class="card usr-prfl-card" >
                <div class="card-body">
                    <h5 class="card-title">A feladat:<br></h5>
                    <p class="card-text">Végezd el az összeadásokat, hogy
                        eltávolíthasd a lemzeket a képről.<br>
                        Ha megvan a teljes kép, nyertél!
                    </p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            </p>
        </div>
        <div class="col-md-8">
            <div class="img-container">
                <div class="cover" id="cover-0101" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0102" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0103" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0104" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0105" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0201" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0202" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0203" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0204" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0205" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0301" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0302" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0303" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0304" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0305" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0401" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0402" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0403" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0404" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0405" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0501" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0502" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0503" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0504" onclick="PM_JS_APP.removeOneCover(this)"></div>
                <div class="cover" id="cover-0505" onclick="PM_JS_APP.removeOneCover(this)"></div>
            </div>
        </div>
    </div>
    <div class="row feladat-row">
        <div class="col-lg-12">
            <h3>Végezd el az összeadást, ha az eredmény jó, akkor egy fedőt eltávolíthatsz, ha tévedsz, visszateszünk egy fedőt!</h3>
            <p id="kpflfd-fldat">
            </p>
        </div>
    </div>

<?php
    echo $pgGnrtr->generateBasicSiteFooter();
?>
