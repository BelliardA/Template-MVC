<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/bd.groups.inc.php";
include_once "$racine/model/bd.activities.php";

session_start();

$id_group = $_GET["idGroup"];

$group = getGroupsById($id_group);
$activity = getActivitiesById($group["id_activity"]);
$times = getTimeByGroup($id_group);



include "$racine/vue/vueGroup.php";