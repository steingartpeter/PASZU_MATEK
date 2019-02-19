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
        <div class="col-md-4">
            <p>
            <div class="card usr-prfl-card" >
                <?php
                    echo '<img class="card-img-top" src="/PASZU_MATEK/media/pics/usr_avatars/'.$_SESSION['USR_AVATAR'].'" alt="Card image cap">';
                ?>
                <div class="card-body">
                    <h5 class="card-title">Üdv <?php echo $_SESSION['USR_NAME']; ?></h5>
                    <p class="card-text">Végre itt vagy, folytathatjuk a munkát?</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </p>
        </div>
        <div class="col-md-8">
            <p>
                <?php
                    //<DEBUG>
                    // DEBUG LEÍRÁSA:
                    //<code>
                    // echo 'SESSION:<pre>';
                    // print_r($_SESSION);
                    // echo '</pre>';
                    //</code>
                    //</DEBUG>
                    
                ?>
            </p>
        </div>
    </div>

<?php
    echo $pgGnrtr->generateBasicSiteFooter();
?>
