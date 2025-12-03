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

if (isset($idVisiteur)) {
    $visiteurASelectionner = $pdo->getInfosVisiteurById($idVisiteur);
    $moisASelectionner = $leMois;
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    if (isset($leMois)) {
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);

        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    }
}


$lesFraisHors = filter_input(INPUT_POST, 'lesFraisHors', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case 'selectionner' :
        include PATH_VIEWS . 'v_listeVisiteurs.php';
        include PATH_VIEWS . 'v_listeMoisAValider.php';
        break;

    case 'validerFrais':
        include PATH_VIEWS . 'v_listeVisiteurs.php';
        include PATH_VIEWS . 'v_listeMoisAValider.php';
        include PATH_VIEWS . 'v_validerFrais.php';
        break;

    case 'majFraisForfait':
        $lesFrais = filter_input_array(INPUT_POST, [
                    'lesFrais' => [
                        'filter' => FILTER_SANITIZE_NUMBER_INT,
                        'flags' => FILTER_REQUIRE_ARRAY
                    ]
                ])['lesFrais'];

        $pdo->majFraisForfait($idVisiteur, $leMois, $lesFrais);

        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);

        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        include PATH_VIEWS . 'v_listeVisiteurs.php';
        include PATH_VIEWS . 'v_listeMoisAValider.php';
        include PATH_VIEWS . 'v_validerFrais.php';
        break;

    case 'majFraisHorsForfait':

        $submitType = filter_input(INPUT_POST, 'submitType', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        switch ($submitType) {
            case 'corriger':
                $idFraisHors = filter_input(INPUT_POST, 'idFraisHors', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $lesFraisHorsD = filter_input(INPUT_POST, 'lesFraisHorsD', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $lesFraisHorsL = filter_input(INPUT_POST, 'lesFraisHorsL');
                $lesFraisHorsM = filter_input(INPUT_POST, 'lesFraisHorsM', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $lesFraisHorsD = DateTime::createFromFormat('d/m/Y', $lesFraisHorsD);
                $lesFraisHorsD = $lesFraisHorsD->format('Y-m-d');

                $pdo->majFraisHorsForfait($idFraisHors, $lesFraisHorsD, $lesFraisHorsL, $lesFraisHorsM);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
                include PATH_VIEWS . 'v_listeVisiteurs.php';
                include PATH_VIEWS . 'v_listeMoisAValider.php';
                include PATH_VIEWS . 'v_validerFrais.php';
                break;
            case 'refuser':
                $idFraisHors = filter_input(INPUT_POST, 'idFraisHors', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $libelleRefuse = filter_input(INPUT_POST, 'lesFraisHorsL', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pdo->refuserFraisHorsForfait($idFraisHors, $libelleRefuse);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
                include PATH_VIEWS . 'v_listeVisiteurs.php';
                include PATH_VIEWS . 'v_listeMoisAValider.php';
                include PATH_VIEWS . 'v_validerFrais.php';
                break;
            case 'reporter':
                $idFraisHors = filter_input(INPUT_POST, 'idFraisHors', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pdo->reporterFraisHorsForfait($idFraisHors);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
                include PATH_VIEWS . 'v_listeVisiteurs.php';
                include PATH_VIEWS . 'v_listeMoisAValider.php';
                include PATH_VIEWS . 'v_validerFrais.php';
                break;
        }
        break;

    case 'validerFicheDeFrais':
        $pdo->majEtatFicheFrais($idVisiteur, $leMois, 'VA');
        include PATH_VIEWS . 'v_listeVisiteurs.php';
        include PATH_VIEWS . 'v_listeMoisAValider.php';
        include PATH_VIEWS . 'v_validerFrais.php';
        break;
}
