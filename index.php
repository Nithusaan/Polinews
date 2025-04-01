<?php
header('Content-Type: text/html; charset=utf-8');
define("CHARGE_AUTOLOAD", true);

// -------------------------------
// Pseudo-cron pour mise à jour des flux RSS
// -------------------------------

// Chemin vers le fichier qui stocke le timestamp de la dernière mise à jour
$timestampFile = __DIR__ . '/last_rss_update.txt';
// Intervalle de mise à jour en secondes (3600 = 1 heure)
$updateInterval = 3600;
$now = time();
// Récupérer le dernier timestamp, s'il existe, sinon 0
$lastUpdate = file_exists($timestampFile) ? (int)file_get_contents($timestampFile) : 0;

// Si l'intervalle est écoulé, exécuter la mise à jour des RSS
if ($now - $lastUpdate >= $updateInterval) {
    // Met à jour le timestamp pour éviter des appels concurrents
    file_put_contents($timestampFile, $now);
    
    // Inclusion du fichier de classes (si non déjà inclus)
    require_once("inc/poo.inc.php");
    // Instanciation de la classe pour exécuter la mise à jour
    $IobcPDO_cron = new IobcPDO();
    $IobcPDO_cron->fetchRSSArticles();
    // Log de l'exécution
    file_put_contents(__DIR__ . '/cron_rss.log', "Mise à jour effectuée à " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
}

// -------------------------------
// Fin du pseudo-cron
// -------------------------------

// Inclusion des classes et démarrage de la session
require_once("inc/poo.inc.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$IobcPDO = new IobcPDO();

// Si aucune action n'est définie, on affecte 'homepage'
if (!isset($_GET['action'])) {
    $_GET['action'] = 'homepage';
}

// Autoriser certaines actions sans être connecté (homepage, login, register, etc.)
if (!isset($_SESSION['user_id']) && 
    !in_array($_GET['action'], ['aboutpolinews', 'homepage', 'videopage', 'login', 'register'])) 
{
    header("Location: index.php?action=login");
    exit;
}

// Sélection de la vue en fonction de l'action
switch ($_GET['action']) {

    case 'aboutpolinews':
        $vue = new aboutpolinews($IobcPDO->getConnection());
        break;

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
    default:
        $vue = new homepage($IobcPDO->getConnection());
        break;
}

echo $vue;
?>
