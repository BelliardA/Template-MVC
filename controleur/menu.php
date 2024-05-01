<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/bd.inc.php";
include_once "$racine/model/bd.authentification.inc.php";

include "$racine/vue/vueMenu.php";