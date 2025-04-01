<?php
header('Content-Type: text/html; charset=utf-8');
// Déclaration de la constante pour protéger le chargement des fichiers inc/*
define("CHARGE_AUTOLOAD", true);
// Chargement automatique des classes (PHP > 5)
require_once("inc/poo.inc.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$IobcPDO = new IobcPDO();

// Si aucune action n'est définie, on affecte 'homepage'
if (!isset($_GET['action'])) {
    $_GET['action'] = 'homepage';
}

// On autorise la vue homepage sans être connecté en ajoutant 'homepage' à la liste des actions autorisées
if (!isset($_SESSION['user_id']) && 
    !in_array($_GET['action'], ['homepage', 'videopage', 'login', 'register'])) 
    {
    header("Location: index.php?action=login");
    exit;
}

// Choisir la classe à utiliser selon l'action
switch ($_GET['action']) {
    case 'videopage':
        $vue = new videopage($IobcPDO->getConnection());
        break;
        
    case 'login':
        $vue = new login($IobcPDO->getConnection());
        break;

    case 'register':
        $vue = new register($IobcPDO->getConnection());
        break;
        
    case 'homepage':
        $vue = new homepage($IobcPDO->getConnection());
        break;

    default:
        $vue = new homepage($IobcPDO->getConnection());
        break;
}

echo $vue;
?>
