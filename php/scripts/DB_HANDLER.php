<?php
//<M>
//×-
//@-MODULÉV   : PASZU_MATEK - DB_HANDLER.php-@
//@-SZERZŐ    : PETER STEINGART-@
//@-LÉTREHOZVA: 2019-02-18-@
//@-FÜGGŐSÉGEK:
//×-
// @-- NO DEPENDENCIES - BASIC FILE-@
//-@
//-×
//-@
//@-LEÍRÁS    :<br/>
// Database management section of the application.<br/>
//@-MÓDOSÍTÁSOK :
//×-
// @-- YYYY-MM-DD
// -@
// @-- ... -@
//-×
//-×
//</M>
    //session_start();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/PASZU_MATEK/php/scripts/PHP_CONSTS.php');

class DB_HANDLER{

    private $con = "";

    public function __construct($h="",$u="",$p="",$dn=""){   
        //<SF>
        // LÉTREHOZÁS:2018. okt. 22.<br>
        // SZERZŐ: Balise Pascal<br>
        // Az alapértelmezett konstruktor, ami csatlakozik az adatbázishoz.<br>
        // PARAMÉTEREK:
        //×-
        // @-- $h = adatbázis HOSTNAME -@
        // @-- $u = adatbázis USERNAME -@
        // @-- $p = adatbázis PASSWORD -@
        // @-- $dn = adatbázis DATABASE NAME -@
        //-×
        //MÓDOSTÁSOK:
        //×-
        // @-- ... -@
        //-×
        //</SF>

        //<nn>
        // Alapértelmezett csatlakozási beállítások használata.
        //</nn>
        if($h == ""){
            $h = DBHOST;
        }
        if($u == ""){
            $u = DBUSER;
        }
        if($p == ""){
            $p = DBPASS;
        }
        if($dn == ""){
            $dn = DBNAME;
        }

        $this->connect($h,$u,$p,$dn);
    
    }

    public function connect($h,$u,$p,$d){
        //<SF>
        // LÉTREHOZÁS:2019-02-18<br>
        // SZERZŐ: Balise Pascal<br>
        // Ez a fügvény intézi a csatlakozást abban az esetben ha nem alapértelemezett pramétekekkel akarunk csatlakozni.<br>
        // PARAMÉTEREK:
        //×-
        // @-- $h = adatbázis HOSTNAME -@
        // @-- $u = adatbázis USERNAME -@
        // @-- $p = adatbázis PASSWORD -@
        // @-- $dn = adatbázis DATABASE NAME -@
        //-×
        //MÓDOSTÁSOK:
        //×-
        // @-- ... -@
        //-×
        //</SF>

        //<nn>
        // Alapértelmezett csatlakozási beállítások használata.
        //</nn>
        $this->c = mysqli_connect($h, $u, $p,$d);

        if(!$this->c){
            $msg = '<h2>KAPCSOLÓDÁS AZ ADATBÁZISHOZ SIKERTELEN!!!</h2>';
            $msg .= '<p>A kapcsolódás az alábbi paraméterekkel sikertelen volt:<br>
                <ol>
                <li>HOST:'.$h.'</li>
                <li>FELHASZNÁLÓ:'.$u.'</li>
                <li>JELSZÓ:'.$p.'</li>
                <li>ADATBÁZIS:'.$d.'</li>
                </ol>
            </p>';
            echo $msg;
        }else{
            //<DEBUG>
            //Siker esetén megtekinthető üzenet kódja:<br>
            //<code> 
            //$msg = '<h2>KAPCSOLÓDÁS AZ ADATBÁZISHOZ <b><u>SIKERES</u></b>!!!</h2>';
            //$msg .= '<p>A kapcsolódás az alábbi paraméterekkel <b><u>sikeres</u></b> volt:<br>
            //    <ol>
            //    <li>HOST:'.$h.'</li>
            //    <li>FELHASZNÁLÓ:'.$u.'</li>
            //    <li>JELSZÓ:'.$p.'</li>
            //    <li>ADATBÁZIS:'.$d.'</li>
            //    </ol>
            //</p>';
            //</code>
            //</DEBUG>
            //mysqli_query($this->c, "set names utf8");
            mysqli_set_charset($this->c,"utf8");
        }
    } 

    public function getConn(){
       //<SF>
        // LÉTREHOZÁS:2018. okt. 22.<br>
        // SZERZŐ: Balise Pascal<br>
        // Ez a függvény kiadja az osztály connection objektumát.<br>
        // PARAMÉTEREK:
        //×-
        // @-- $h = adatbázis HOSTNAME -@
        // @-- $u = adatbázis USERNAME -@
        // @-- $p = adatbázis PASSWORD -@
        // @-- $dn = adatbázis DATABASE NAME -@
        //-×
        //MÓDOSTÁSOK:
        //×-
        // @-- ... -@
        //-×
        //</SF>

        return $this->c;
    }    

    public function get_pwd_for_ipn($i){
        //<SF>
        // LÉTREHOZÁS: 2019-02-18<br>
        // SZERZŐ: AX07057<br>
        // A LOGIN folyamat támogatása, olyan módon, hogy a beérkező IPN-hez lekérdezzük az adatbázisban tárolt jelszót, amjd visszaadjuk.<br>
        // PARAMÉTEREK:
        //×-
        // @-- @param = ... -@
        //-×
        //MÓDOSTÁSOK:
        //×-
        // @-- ... -@
        //-×
        //</SF>

        $retArr = array();
        $retArr['MSG'] = "";
        $retArr['FLAG'] = "";

        //<nn>
        //kell egy kapcsolatobjektum a queryhez!
        //</nn>
        $c = $this->getConn();

        //<nn>
        //A query, hogy a jelszóhoz jussunk.
        //</nn>
        $q = "call matekgyak.sp_GET_PWD_FOR_USRNM('".$i."');";

        $res = mysqli_query($c,$q);

        if(!$res){
            $retArr['FLAG'] = "NOK";
            $msg = '<p class="bg-danger">';
            $msg .= 'QUERY HIBA!!!<br>';
            $msg .= 'A query : (<code> '.$q.'</code>)<br>';
            $msg .= 'hibát okozott!<br>A hiba leírása:<br>';
            $msg .= '<code>'.mysqli_error($c).'</code><br>';
            $msg .= '==============================================================<br>';
            $msg .= 'Signature:DB_HANDLER->get_pwd_for_ipn<br>';
            $msg .= '==============================================================<br>';
            $retArr['MSG'] = $msg;
        }else{
            $rw = mysqli_fetch_assoc($res);
            $retArr['FLAG'] = "OK";
            $retArr['MSG'] = 'QUERY OK!'; 
            $retArr['PWD'] = $rw['usr_pwd'];
            $retArr['DATA'] = array();
            $retArr['DATA'] = $rw;
            
        }

        return $retArr;
    }



}