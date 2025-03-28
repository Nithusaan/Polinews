<?php
// On déclare une constante pour protéger le chargement des fichiers inc/*
define("CHARGE_AUTOLOAD",true);
// Cet include permet de faire l'autoload automatiquement en PHP>5
require_once("inc/poo.inc.php");
session_start();

$pdo = new db();
$pdo->BDD();

    $vue = new Vue($pdo);
    echo $vue;

?>