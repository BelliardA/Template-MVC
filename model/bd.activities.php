<?php

include_once "bd.inc.php";

function getActivities() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from activities");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTimeActivitiesById($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from horraire_activities where id_activity=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}

function updateHorraire($idActivity, $idGroup, $time){  
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE `horraire_activities` SET id_group=:idGroup, is_book = 1 WHERE id_activity=:idActivity AND start_time=:time");
        $req->bindValue(':idGroup', $idGroup, PDO::PARAM_STR);
        $req->bindValue(':idActivity', $idActivity, PDO::PARAM_INT);
        $req->bindValue(':time', $time, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getActivitiesById($id) {
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from activities where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}