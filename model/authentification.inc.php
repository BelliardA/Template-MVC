<?php

include_once "bd.users.inc.php";

function login($mail, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUsersByMail($mail);
    $mdpBD = $util["password"];
    
    if (password_verify($mdp, $mdpBD)) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mail"] = $mail;
        $_SESSION["mdp"] = $mdpBD;
    }
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION["mail"]);
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mail"]);
    unset($_SESSION["mdp"]);
}

function register($mail, $password, $name, $firstname, $school) {
    return addUsers($mail, $password, $name, $firstname, $school);
}