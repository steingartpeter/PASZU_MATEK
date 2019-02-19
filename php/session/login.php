<?php
//<M>
//×-
//@-MODULÉV   : PASZU_MATEK - login.php-@
//@-SZERZŐ    : AUTHORS_NAME-@
//@-LÉTREHOZVA: CRAETION_DATE-@
//@-FÜGGŐSÉGEK:
//×-
// @-- MAIN_APP.php-@
//-@
//-×
//-@
//@-LEÍRÁS    :<br/>
//Basic login page, with MySQL validator.<br/>
//@-MÓDOSÍTÁSOK :
//×-
// @-- 2016-07-21
// -@
// @-- ... -@
//-×
//-×
//</M>

    require_once($_SERVER['DOCUMENT_ROOT'].'/PASZU_MATEK/php/scripts/MAIN_APP.php');
    
    //<DEBUG>
    // SESSION elemek ellenőrzése:
    //<code>
    // echo '<p>SESSION:<pre>';
    // print_r($_SESSION);
    // echo '</pre></p>';
    //</code>
    //</DEBUG>
    

    $pgGnrtr = new MAIN_APP();
    $html = '';
    echo $pgGnrtr->generateBasicSiteHeader("LOGIN");

    if(!isset($_POST['submit-sgnin'])){
      //<DEBUG>
      // A POST tömb ellenőrzése:
      //<code>
      // echo '<p>POST:<pre>';
      // print_r($_POST);
      // echo '</pre></p>';
      //</code>
      //</DEBUG>
      
    }else{
      $usr = $_POST['inputUser'];
      $pwd = strtoupper(sha1($_POST['inputPassword'],false));
      
      $res = $pgGnrtr->checkLogin($usr,$pwd);
      
      if($res['FLAG'] != 'OK'){
        $html = $res['MSG'];
      }else{
        //<DEBUG>
        // Az azonosításra kapott adatbázis válasz:
        //<code>
        // echo '<p>A válasz:<pre>';
        // print_r($res);
        // echo '</pre></p>';
        // die('SESSION SETUP');
        //</code>
        //</DEBUG>
        
        $_SESSION['USR_LGDIN'] = true;
        $_SESSION['USR_USRNM'] = $res['DATA']['usr_name'];
        $_SESSION['USR_NAME'] = $res['DATA']['usr_fstnm'].' '.$res['DATA']['usr_lstnm'];
        $_SESSION['USR_MAIL'] = $res['DATA']['usr_email'];
        $_SESSION['USR_DBID'] = $res['DATA']['user_id'];
        $_SESSION['USR_LST_LOGIN'] = $res['DATA']['usrlstlogin'];
        $_SESSION['USR_AVATAR'] = $res['DATA']['usr_avatar_url'];

        header("location: /PASZU_MATEK/index.php");
      }

      $pwdChck = "";
    }


?>

<div class="container">
    <div class="row">
      <div class="col-sm-5">
        <?php
          if($html != ''){
            echo $html;
          }
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="POST" action="#">
              <div class="form-label-group">
                <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Felhasználó neve" required autofocus>
                <label for="inputUser">Felhasználó neve</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Jelszó" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit-sgnin" type="submit">Bejelentkezés</button>
              <hr class="my-4">
              <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" name="submit-ggl" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" name="submit-fcb" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
              -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    echo $pgGnrtr->generateBasicSiteFooter();
  ?>