<?php
//<M>
//×-
//@-FILENÉV   : PASZU_MATEK - AJAX_HELPER-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA: 2019-02-19-@
//@-FÜGGŐSÉGEK:
//×-
// @-- DB_HANDLER.php -@
//-×
//-@
//@-LEÍRÁS    :
// Rövid leírás a FILE/MODUL/STB elem funkciójáról, működéséről...
// -@
//@-MÓDOSÍTÁSOK :
//×-
// @-- CHANGE_DATE :<br>
// Rövid leírás a módosítás lényegéről...
//-@
//-×
//-×
//</M>

    require_once($_SERVER['DOCUMENT_ROOT'].'/PASZU_MATEK/php/scripts/DB_HANDLER.php');

    if(strpos(array_keys($_REQUEST)[0],'":"') > 0){
		//<nn>
		//No az ANGULAR a data objektumot JSON formátumban küldi, így sajnos
		//azt dekódolni kell...
		//</nn>
		$var = json_decode(array_keys($_REQUEST)[0], true);
		//<DEBUG>
		// A JSON dekódolt REQUEST tömb megnézésée:<br>
		//print_r($var);
		//echo "************************";
		//echo "\$var.procId:" . $var['procId'] . "\n";
		//</DEBUG>
		
		//<nn>
		// A $_REQUETS procId-jébe betesszük a $var DEJSONIFIED procID-jét, így az angular-os, és @author ax07057
		// nem angularos hívások is működnek.
		//</nn>
		$_REQUEST["PRC_ID"] = $var['PRC_ID'];
		//<DEBUG>
		//...
		//$_REQUEST["procId"] = $var["procId"];
		//echo "String ellenőrzés -> OK(pos:) ->Keys: <br>Print_r \$_REQUEST-re:<br>";
		//print_r($_REQUEST);
		//</DEBUG>
		
	}



    if(isset($_REQUEST['PRC_ID']) && $_REQUEST['PRC_ID'] != ''){
        $prcId = $_REQUEST['PRC_ID'];
        if($prcId == 'TST_AJAX_CALL'){
            hndl_testRequest();
        }else{
            $retArr = array();
            $retArr['FLAG'] = 'NOK';
            $retArr['MSG'] = 'A ' . $prcId . ' PROC ID kezeléséhez még nem készülr el a megfelelő IF-ELSEIF ág, meg kellen írni :).';
            echo json_encode($retArr,JSON_UNESCAPED_UNICODE);
        }
    }else{
        $retArr = array();
        $retArr['FLAG']  = 'NOK';
        $retArr['MSG'] = 'Nem érkezett, vagy üres PROC_ID érkezett, a kérést nem lehet feldogozni!';
        echo json_encode($retArr,JSON_UNESCAPED_UNICODE);
    }

    //+---------------------------------------------------------------------------------------------------------+
    //|@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@|
    //|##########                         AZ AJAX HÍVÁSOKAT KEZELŐ FÜGGVÉNYEK                         ##########|
    //|@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@|
    //+---------------------------------------------------------------------------------------------------------+

    function hndl_testRequest(){
        //<SF>
        // LÉTREHOZÁS: 2019-02-19<br>
        // SZERZŐ: AX07057<br>
        // Az AJAX hívások teszteléshez szükséges alapfüggvény.<br>
        // PARAMÉTEREK:
        //×-
        // @-- @param = ... -@
        //-×
        //MÓDOSTÁSOK:
        //×-
        // @-- ... -@
        //-×
        //</SF>


    }

?>