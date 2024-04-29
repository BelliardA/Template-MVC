<?php

include_once "bd.users.inc.php";

function login($mail, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUsersByMail($mail);
    $mdpBD = $util["mdpu"];

    if (trim($mdpBD) == trim(crypt($mdp, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mailU"] = $mailU;
        $_SESSION["mdpU"] = $mdpBD;
    }
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION["mailU"]);
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
}

function register($mail, $password, $name, $firstname, $school) {
    $mdpCrypt = crypt($mdp, "sel");
    return addUsers($mail, $mdpCrypt, $name, $firstname, $school);
}