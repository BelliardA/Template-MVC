<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "menu.php "; 
    $lesActions["connexion"] = "connexion.php";
    $lesActions["register"] = "register.php";
    $lesActions["deconnexion"] = "deconnexion.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>