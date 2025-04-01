<?php
// pseudo_cron.php

// Chemin vers un fichier qui enregistre le timestamp de la dernière mise à jour
$timestampFile = __DIR__ . '/last_rss_update.txt';
$updateInterval = 3600; // 3600 secondes = 1 heure

$now = time();
$lastUpdate = file_exists($timestampFile) ? (int)file_get_contents($timestampFile) : 0;

if ($now - $lastUpdate >= $updateInterval) {
    // Mettre à jour le timestamp avant d'exécuter la mise à jour pour éviter les appels concurrents
    file_put_contents($timestampFile, $now);

    // Inclure votre script de mise à jour RSS
    require_once 'inc/poo.inc.php';
    $IobcPDO = new IobcPDO();

    // Exécute la mise à jour des flux RSS
    $IobcPDO->fetchRSSArticles();

    // Vous pouvez également écrire dans un log si besoin
    file_put_contents(__DIR__ . '/cron_rss.log', "Mise à jour effectuée à " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
}
?>
