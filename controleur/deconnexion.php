<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/authentification.inc.php";

logout();

include "$racine/vue/vueMenu.php";