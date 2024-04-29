<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/authentification.inc.php";

if (isset($_POST["mail"]) && isset($_POST["password"])){
    $mail=$_POST["mail"];
    $mdp=$_POST["password"];
}
else
{
    $mail="";
    $mdp="";
}

login($mail,$mdp);

if (isLoggedOn()){
    include "$racine/controleur/menu.php";
}
else{
    $titre = "authentification";
}