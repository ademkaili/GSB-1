<?php

/*
 * Gestion valider frais
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case 'selectionnerFiche' :
        $lesVisiteurs = $pdo->getLesVisiteurs();
        $leVisiteur = filter_input(INPUT_POST, 'visiteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (isset($leVisiteur)) {$visiteurASelectionner= $pdo->getInfosVisiteurById($leVisiteur);}
        $lesMois = $pdo->getLesMoisDisponibles($leVisiteur);
        include PATH_VIEWS . 'v_listeVisiteurs.php';
        include PATH_VIEWS . 'v_listeMoisAValider.php';
}
