<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/authentification.inc.php";

if (isset($_POST["mail"]) && isset($_POST["password"] )&& isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["school"])){
    $mail=$_POST["mail"];
    $mdp=$_POST["password"];
    $name=$_POST["name"];
    $firstname=$_POST["firstname"];
    $school=$_POST["school"];
}
else
{
    $mail="";
    $mdp="";
    $name="";
    $firstname="";
    $school="";
}

register($mail, $password, $name, $firstname, $school);