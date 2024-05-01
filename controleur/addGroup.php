<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/model/bd.groups.inc.php";
include_once "$racine/model/bd.activities.php";
include_once "$racine/model/bd.groups_user.php";

session_start();
$activities = getActivities();

if (isset($_POST["name"]) && isset($_POST["id_activity"])){
    $name=$_POST["name"];
    $description=$_POST["description"];
    $isPublic=$_POST["isPublic"];
    $id_activity=$_POST["id_activity"];

    $isPublic = $isPublic == "on" ? 1 : 0;
    $ulid = generateULID();
    $result = addGroups($ulid, $name, $isPublic, $description, $id_activity);
}

if(isset($result) && $result){
    include "$racine/vue/vueDetailsGroup.php";
    $mail = $_SESSION["mail"];
    
    addGroupsUser($mail, $ulid, 1);
}else{
    include "$racine/vue/vueAddGroup.php";
}