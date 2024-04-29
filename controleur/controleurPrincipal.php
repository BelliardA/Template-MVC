<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "menu.php "; 
    $lesActions["connexion"] = "connexion.php";
    $lesActions["register"] = "register.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>