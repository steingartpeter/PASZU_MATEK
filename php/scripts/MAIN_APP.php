<?php
//<M>
//×-
//@-MODULÉV   : PASZU_MATEK - MAIN_APP.php-@
//@-SZERZŐ    : PETER STEINGART-@
//@-LÉTREHOZVA: 2019-02-17-@
//@-FÜGGŐSÉGEK:
//×-
// @-- NO DEPENDENCIES - BASIC FILE-@
//-@
//-×
//-@
//@-LEÍRÁS    :<br/>
// Basis of the application, mostly with HTML generation, and sub class using functions.<br/>
//@-MÓDOSÍTÁSOK :
//×-
// @-- YYYY-MM-DD
// -@
// @-- ... -@
//-×
//-×
//</M>
    

  session_start();

    

  require_once($_SERVER['DOCUMENT_ROOT'] . '/PASZU_MATEK/php/scripts/PHP_CONSTS.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/PASZU_MATEK/php/scripts/DB_HANDLER.php');


class MAIN_APP{
    //<nn>
    // The basic class of the application, manages the cooperation of the elements.
    //</nn>

    private $db = "";

    public function __construct(){
        //<SF>
        //LÉTREHOZVA: 2019-02-17<br/>
        //SZERZÓ: PETER STEINGART<br/>
        //LEÍRÁS: The normal basic contructor.<br/>
        //</SF>

        //echo '<p>MAIN APP CONSTRUCTION WAS DONE....</p>';
      $this->db = new DB_HANDLER();

    }
    
    public function generateBasicSiteHeader($mnTTl=""){
        //<SF>
        //LÉTREHOZVA: 2019-02-17<br/>
        //SZERZÓ: STEINGART PÉTER<br/>
        //LEÍRÁS: Az alap oldaltető legenrálása<br/>
        //</SF>

        if($mnTTl == ""){
            $mnTTl = 'ALAPÉRTELMEZETT LAP CÍM';
        }

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
            <link rel="stylesheet" href="/PASZU_MATEK/JS/bootstrap421/css/bootstrap-grid.min.css">
            <link rel="stylesheet" href="/PASZU_MATEK/JS/bootstrap421/css/bootstrap.min.css">
            <link rel="stylesheet" href="/PASZU_MATEK/style/mainStyle.css">
        
            <script src="/PASZU_MATEK/JS/jQuery/jquery331.js"></script>
            <script src="/PASZU_MATEK/JS/popper/popper.js"></script>
            <script src="/PASZU_MATEK/JS/bootstrap421/js/bootstrap.js"></script>
            <script src="/PASZU_MATEK/JS/own_app/js_consts.js"></script>
            <script src="/PASZU_MATEK/JS/own_app/main_app.js"></script>
        
            <title>'.$mnTTl.'</title>
        </head>
        <body>
            
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#">PM</a>
          
          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/PASZU_MATEK/index.php"> Kezdőlap <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gyakorlatok</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown02">
                        <a class="dropdown-item" href="/PASZU_MATEK/php/subSites/xcrsise/kepfelfedo.php">Képfelfedő</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#"> Kikapcsolt link </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" 
                    href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lenyíló menü</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Keresés</button>
            </form>';


        if(isset($_SESSION['USR_LGDIN']) && $_SESSION['USR_LGDIN'] != ''){
          $html .= '<a class="btn btn-danger log-btn" href="/PASZU_MATEK/php/session/logout.php"> Kilépés </a>';
        }else{
          $html .= '<a class="btn btn-primary log-btn" href="/PASZU_MATEK/php/session/login.php"> Belépés </a>';
        }

        $html .= '</div>
        </nav>
        <main role="main" class="container down-80px cntnr-85%">';
        
        return $html;
        


    }

    public function generateBasicSiteFooter(){
        //<SF>
        //LÉTREHOZVA: 2019-02-17<br/>
        //SZERZÓ: STEINGART PÉTER<br/>
        //LEÍRÁS: Az alap oldal-lábléc legenrálása<br/>
        //</SF>

        $html ='</main>
            </body>
            </html>';

        return $html;
    }



  //+-------------------------------------------------------------------------+
  //|@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@|
  //|##########          LOGIN HANDLING/USER VALIDATION             ##########|
  //|@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@|
  //+-------------------------------------------------------------------------+


  public function checkLogin($u,$p){
    //<SF>
    // LÉTREHOZÁS: 2019-02-18<br>
    // SZERZŐ: AX07057<br>
    // A login ellenőrzése.<br>
    // PARAMÉTEREK:
    //×-
    // @-- $u = felhasználónév -@
    // @-- $p = jelszó -@
    //-×
    //MÓDOSTÁSOK:
    //×-
    // @-- ... -@
    //-×
    //</SF>

    $retArr = array();
    $retArr['FLAG'] = "";
    $retArr['MSG'] = "";

    error_reporting(E_ERROR);

    $c = $this->db->getConn();

    $res = $this->db->get_pwd_for_ipn($u);

    if($res['FLAG'] == 'OK'){

      if(!isset($res['PWD']) || $res['PWD'] == ''){
        $retArr['FLAG'] = "NOK";
        $msg = '<p class="bg-danger">SIKERTELEN bejelentkezés!<br>Ellenőrizd a felhasználó nevedet!</p>';
        $retArr['MSG'] = $msg;
      }else{
        if(strtoupper($res['PWD']) == $p){
          //<nn>
          // Nincs semmi tennivaló, a bejelentkezés sikeres volt, visszaadjuk a választ a hivónak.
          //</nn> 
          $retArr = $res;
        }else{
          $retArr['FLAG'] = "NOK";
          $msg = '<p class="bg-danger">SIKERTELEN bejelentkezés!<br>Ellenőrizd a jelszavadat!</p>';
          $retArr['MSG'] = $msg;
          //echo '<p>A beküldött jelszó: '.$p.'</p>';
        }
      }
    }else{
      echo '<p>Az adatbázisvalidáció válasza:<pre>';
      print_r($res);
      echo '</pre></p>';
    }

    return $retArr;
  }  

  public function updt_Usr_Lastlogin(){
    //<SF>
    // LÉTREHOZÁS: 2019-02-19<br>
    // SZERZŐ: AX07057<br>
    // Csak adatbázisba írjuk az utolsó kilogolás időpontját.<br>
    // PARAMÉTEREK:
    //×-
    // @-- @param = ... -@
    //-×
    //MÓDOSTÁSOK:
    //×-
    // @-- ... -@
    //-×
    //</SF>

      $c = $this->db->getConn();

      $q = "call matekgyak.sp_UPDT_Lastlogin(" . $_SESSION['USR_DBID'] . ", NULL);";

      mysqli_query($c, $q);

      //<nn>
      // Mivel ez csak kilépéskor történik, nincs kit infomrálni a sikerről, vagy a kudracról, így az ellenőrzéstől
      // most eltekintünk.
      //</nn>

  }




  }



?>