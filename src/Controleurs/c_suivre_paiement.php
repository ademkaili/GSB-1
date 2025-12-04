<?php

/*
 * Gestion valider frais
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

use Outils\Utilitaires;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lesVisiteurs = $pdo->getLesVisiteurs();

$idVisiteur = filter_input(INPUT_POST, 'visiteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$leMois = filter_input(INPUT_POST, 'mois', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (isset($idVisiteur)  && $idVisiteur != null) {
    $visiteurASelectionner = $pdo->getInfosVisiteurById($idVisiteur);
    $moisASelectionner = $leMois;
    $lesMois = $pdo->getLesMoisDisponiblesARembourser($idVisiteur);
    if (isset($leMois)) {
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);

        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    }
} else {
    $action = 'selectionnerVisiteur';
}


$lesFraisHors = filter_input(INPUT_POST, 'lesFraisHors', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case 'selectionnerVisiteur' :
        include PATH_VIEWS . 'v_suivreListeVisiteurs.php';
        break;
    
    case 'selectionnerMois' :
        include PATH_VIEWS . 'v_suivreListeVisiteurs.php';
        include PATH_VIEWS . 'v_suivreListeMois.php';
        break;

    case 'afficherFrais':
        include PATH_VIEWS . 'v_suivreListeVisiteurs.php';
        include PATH_VIEWS . 'v_suivreListeMois.php';
        include PATH_VIEWS . 'v_suivre_paiement.php';
        break;

    case 'rembourserFrais':
        
        $pdo->majEtatFicheFrais($idVisiteur, $leMois, 'RB');
        
        include PATH_VIEWS . 'v_suivreListeVisiteurs.php';
        include PATH_VIEWS . 'v_suivreListeMois.php';
        include PATH_VIEWS . 'v_suivre_paiement.php';
        break;
}
