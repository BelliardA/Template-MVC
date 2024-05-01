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
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

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