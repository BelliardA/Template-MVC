<?php

include "bd.inc.php";

function getGroups() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from groups");
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

function getGroupsById($id) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from groups where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addGroups($ulid, $name, $is_public ,$description, $activity_id) {
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("INSERT INTO `groupes` (id, name, is_public, description, id_activity) VALUES (:id, :name, :is_public, :description, :id_activity)");
        $req->bindValue(':id', $ulid, PDO::PARAM_STR);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':is_public', $is_public, PDO::PARAM_BOOL);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':id_activity', $activity_id, PDO::PARAM_INT);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function generateULID() {
    // Génère un timestamp en millisecondes depuis l'époque UNIX
    $time = microtime(true) * 1000;

    // Convertit le timestamp en chaîne
    $timeStr = strval($time);

    // Génère une chaîne aléatoire de 16 caractères en base 36 (en minuscules)
    $randomStr = '';
    for ($i = 0; $i < 16; $i++) {
        $randomStr .= base_convert(mt_rand(0, 35), 10, 36);
    }

    // Concatène le timestamp et la chaîne aléatoire
    $ulid = $timeStr . $randomStr;

    return $ulid;
}
