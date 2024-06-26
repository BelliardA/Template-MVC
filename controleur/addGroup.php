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
    if(isset($_POST["isPublic"])){
        $isPublic = 1;
    }else{
        $isPublic = 0;
    }
    $id_activity=$_POST["id_activity"];

    $ulid = generateULID();
    $result = addGroups($ulid, $name, $isPublic, $description, $id_activity);
}

if(isset($result) && $result){
    $mail = $_SESSION["mail"];
    addGroupsUser($mail, $ulid, 1);

    header("Location:./?action=detailGroup&idGroup=$ulid&idActivity=$id_activity");
}else{
    include "$racine/vue/vueAddGroup.php";
}

function verifActivityDipo($idActivity){
    $timeActivities = getTimeActivitiesById($idActivity);
    foreach ($timeActivities as $timeActivity){
        if($timeActivity["is_book"] == 0){
            return true;
        }
    }
    return false;
}