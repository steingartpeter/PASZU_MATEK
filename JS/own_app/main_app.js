//<M>
//×-
//@-FILENÉV   : PASZU_MATEK - main_app.js-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA: 2019-02-19-@
//@-FÜGGŐSÉGEK:
//×-
// @-- NINCSENEK FÜGGŐSÉGEK -@
//-×
//-@
//@-LEÍRÁS    :
// Az alkalmazás alap JS file-ja.
// -@
//@-MÓDOSÍTÁSOK :
//×-
// @-- CHANGE_DATE :<br>
// Rövid leírás a módosítás lényegéről...
//-@
//-×
//-×
//</M>

var PM_JS_APP = PM_JS_APP || {};

$(function(){
    console.log('JQuery site init runs :)...');

    //<nn>
    // A képfelfedő oldal inicializálása.
    //</nn>
    if(document.URL.substr(-20) == "rsise/kepfelfedo.php"){
        console.log('Képfelfedő inciclizálás')
        PM_JS_APP.initKpFlfd();
    }else{
        console.log("ismeretlen url: ",document.URL);
    }

});




//+-----------------------------------------------------------------------------------+
//|@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@|
//|##########                     HELPER/TEST FUNCTIONS                     ##########|
//|@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@|
//+-----------------------------------------------------------------------------------+

PM_JS_APP.ajxTst = function(){
    //<SF>
    // LÉTREHOZÁS: 2019-02-19<br>
    // SZERZŐ: AX07057<br>
    // Egy ajax hívás tesztelő függvényke.<br>
    // PARAMÉTEREK:
    //×-
    // @-- nincsenek paraméterek -@
    //-×
    //MÓDOSTÁSOK:
    //×-
    // @-- ... -@
    //-×
    //</SF>

    var data = {'PRC_ID':'teszProcid'};

    $.ajax({
        type:"POST",
        url:"/PASZU_MATEK/php/scripts/AJAX_HELPER.php",
        data:data,
        success:function(rsp){
            console.log("data: ", rsp);
            var rspns = (JSON.parse(rsp));
            if(rspns.FLAG != 'OK'){
                var m = $('main');
                var d = '<div class="row"><div class="col-md-6 ajx-error"><h3>AJAX HIBA!</h3>';
                $.each(rspns, function(key, value){
                    d += '<b><u>'+key + '</u></b> : ' + value +'<br>';
                });
                d += '</div></div>';
                m.append(d);
            }
        },
        error:function(){
            console.log("AJAX hiba:");
        },
        complete:function(){
            console.log("AJAX COMPLETE:");
        }
    });



}

PM_JS_APP.genRndInt = function(mn, mx){
    //<SF>
    // LÉTREHOZÁS: 2019-02-19<br>
    // SZERZŐ: AX07057<br>
    // Sima véletlenszám generátor.<br>
    // PARAMÉTEREK:
    //×-
    // @-- @mn = a minimum, inkluzív -@
    // @-- @mx = a maximum, inkluzív -@
    //-×
    //MÓDOSTÁSOK:
    //×-
    // @-- ... -@
    //-×
    //</SF>

    //<nn>
    // Alapértelemzésben 0 és 10 közötti számot generálunk.
    //</nn>
    if(mn === undefined){
        mn = 0;
    }
    if(mx === undefined){
        mx = 10;
    }

    var res = mn;

    res = Math.floor(Math.random()*((mx+1)-mn));

    return res;


}

PM_JS_APP.initKpFlfd = function(){
    //<SF>
    // LÉTREHOZÁS: 2019-02-19<br>
    // SZERZŐ: AX07057<br>
    // A képfelfedős oldal inicializálása.<br>
    // PARAMÉTEREK:
    //×-
    // @-- @param = ... -@
    //-×
    //MÓDOSTÁSOK:
    //×-
    // @-- ... -@
    //-×
    //</SF>
    console.log("INIT meghívva");
    var html = '<span id="operandA">6</span><span id="operandus"> + </span><span id="operandB">3</span> = ';
    html += '<input type="number" id="eredmeny" placeholder="??"/><button id="kpftlt-go" class="btn btn-success" onclick="PM_JS_APP.chckKpflfdResult()">';
    html += '<img class="svg-icon"src="/PASZU_MATEK/style/icons/svg/check.svg"></button><br>';
    html += '<div id="resCntnr"></div>';
    $("#kpflfd-fldat").html(html);

}

PM_JS_APP.chckKpflfdResult = function(){
    //<SF>
    // LÉTREHOZÁS: 2019-02-19<br>
    // SZERZŐ: AX07057<br>
    // Ellenőrizzük, hogy az összeadé OK volt-e, és h igen akkor e levehető elemek számát 1-e
    // megnöveljük.<br>
    // PARAMÉTEREK:
    //×-
    // @-- @param = ... -@
    //-×
    //MÓDOSTÁSOK:
    //×-
    // @-- ... -@
    //-×
    //</SF>
    
    var x = parseInt($("#operandA").text());
    var y = parseInt($("#operandB").text());
    var op = $("#operandus").text().trim();
    var expRes = '';
    var res = $('#eredmeny').val();

    //<nn>
    // Ha volt korábbi eredmény, akkor azt kitöröljük.
    //</nn>
    $("#resCntnr").html('');

    if(res == ''){
        //<nn>
        // Ha a koma nem írt be eredményt, akkor ráugrik a zsaru.
        // Öszeállítjuk a HTML figyelmeztetést, és megjelenítjük.
        //</nn>
        var html = '<p class="ERRMsg">'
        html +='<img src="/PASZU_MATEK/media/pics/UI/angry_cop.jpg" alt="EJNYE, EJYNE..."><br>';
        html += 'De hiszen üres az eredmény mező, ez biztos nem jó!</p>';
        $("#resCntnr").append(html);
    }else{
        if(op === '+'){
            expRes = x+y;
        }else if(op === '-'){
            expRes = x-y;
        }else{
            console.error('Ismeretlen opreandus: ' + op);
        }
    
        console.log('Operandus A: ', x, ', operandusB:',y);
        console.log('A várt eredmény pedig: '+expRes);
        console.log('A valós eredmény:'+res);
        //<nn>
        // Egy IF szerkezettel megvizsgáljuk, és kezeljük az eredményt, vagy hibát
        //</nn>
        if(expRes == res){
            //<nn>
            // Na, az eredmény jó.. kéne pár dolgot csinálni...
            //×-
            // @-- a javascript konstansok frissítése -@
            // @-- adatbázis siker beszúrás -@
            // @-- a cover-ek átszínezése, zöldre=levehető -@
            // @-- ... -@
            //-×
            //</nn>
            PM_JS_APP.CONSTS.NUMERICS.NR_OF_NON_OPCTY_COVER--;
            PM_JS_APP.CONSTS.NUMERICS.NR_OF_OPCTY_COVER++;
            PM_JS_APP.CONSTS.NUMERICS.NR_OF_PSBL_CLEAR_COVER = 1;
            $(".cover").css({
                "background-color":PM_JS_APP.CONSTS.COLORS.UI.FELFED_UNLCKD
            });

        }else{
            var html = '<p class="ERRMsg">'
            html +='<img src="/PASZU_MATEK/media/pics/UI/error.jpg" alt="HIBA :("><br>';
            html += 'Nos, ez nem az igaz, számold át még egyszer!</p>';
            $("#resCntnr").append(html); 
        }
    }

    
    
}

PM_JS_APP.getSessionData = function(elemntNm){
    //<SF>
    //LÉTREHOZVA: 2019-02-22<br/>
    //SZERZÓ: AX07057<br/>
    //LEÍRÁS: A PHP session egyes elemeinek lekérdezése<br/>
    //PARAMÉTEREK<br>
    //×-
    // @-- elemntNm = a keresett elem neve. -@
    // @-- list item 02 -@
    // @-- list item 03 -@
    //-×
    //</SF>

    var data = {'PRC_ID':'getSession','sessElmnt':'FULL'};

    $.ajax({
        type:"POST",
        url:"/PASZU_MATEK/php/scripts/AJAX_HELPER.php",
        data:data,
        success:function(rsp){
            console.log("data: ", rsp);
            var rspns = (JSON.parse(rsp));
            if(rspns.FLAG != 'OK'){
                var m = $('main');
                var d = '<div class="row"><div class="col-md-6 ajx-error"><h3>AJAX HIBA!</h3>';
                $.each(rspns, function(key, value){
                    d += '<b><u>'+key + '</u></b> : ' + value +'<br>';
                });
                d += '</div></div>';
                m.append(d);
            }else{
                if(rspns.MSG !== undefined){
                    console.log('Ajax válasz: ',rspns.MSG);
                }else{
                    console.error('AJJAJJ, MÉG VÁLASZ SINCS!!!');
                }
            }
        },
        error:function(){
            console.log("AJAX hiba:");
        },
        complete:function(){
            console.log("AJAX COMPLETE:");
        }
    });
}

PM_JS_APP.removeOneCover = function(t){
    //<SF>
    //LÉTREHOZVA: 2019-02-24<br/>
    //SZERZÓ: AX07057<br/>
    //LEÍRÁS: A kattintott DIV elem opacitiét lenullázzuk.<br/>
    //</SF>

    //<DEBUG>
    // A THIS vizsgálata:
    //<code>
    // console.info("Na, akkor ezt eltüntetjük....");
    // console.info("this:", t);
    //</code>
    //</DEBUG>
    
    if(PM_JS_APP.CONSTS.NUMERICS.NR_OF_PSBL_CLEAR_COVER > 0){
        $(t).css({
            'opacity':0
        });
        PM_JS_APP.CONSTS.NUMERICS.NR_OF_PSBL_CLEAR_COVER = 0;
        $(".cover").css({
            "background-color":PM_JS_APP.CONSTS.COLORS.UI.FELFED_LCKD
        });
        $("#operandA").text(PM_JS_APP.genRndInt());
        $("#operandB").text(PM_JS_APP.genRndInt());
        $("#eredmeny").val('');
    }
    
}