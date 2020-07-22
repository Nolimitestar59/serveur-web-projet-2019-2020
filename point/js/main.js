var requiere = 1;
var EventTab = new Array();


function onload()
{
 GET_datas();
 console.log("Page chargée");
}


function GET_datas() {
    //var saisie = document.getElementById("chercheEventa").value;

    // $.ajax({
    // type : "POST",
    // contentType : "application/x-www-form-urlencoded;charset=utf-8",
    // url :"bdd/afficheListeEvenement.php",
    // dataType : "json",
    // data : {
    //   action : "show_Event",
    // },
    // success : function(result){
    //   EventTab = result;
    //   IncFunction();
    //   console.dir(result);
    //   console.log('Requete faite')
    // },
    // error : function(){
    //   console.log("error_user");
    // }
    //
    // });

    $.ajax({
            type: "POST",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            url: 'bdd/app.php',
            dataType:"json",
            data: {action: 'show_Event'},
            success: function (result) {
                console.log("Données chargés - Event");
                EventTab = result;
                console.dir(EventTab);
                IncFunction();
            },
            error: function(){
                console.log('Erreur - Event');

            }
        });
}


function IncFunction()
{
    INC++
    IncLoader(INC);
}

function IncLoader(INC){
    if (INC == Requiere)
    {
        console.log("Loader terminé");
        EVENT_DISPLAYER();
    }
}

function EVENT_DISPLAYER()
{
  console.log("afficher les events");
}
