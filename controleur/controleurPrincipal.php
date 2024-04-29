<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "user.php ";     // enter the name of the default controller


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>