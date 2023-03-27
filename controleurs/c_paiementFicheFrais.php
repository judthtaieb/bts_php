<?php


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);

switch ($action) {

    case 'detailFicheValidee':

        $mois = filter_input(INPUT_GET, 'mois', FILTER_SANITIZE_ENCODED);
        $unVisiteur = filter_input(INPUT_GET, 'idvisiteur', FILTER_SANITIZE_ENCODED);
        $fraisForfaitVisiteur = $pdo->getLesFraisForfait(  $unVisiteur, "202212");
        $fraisHorsForfaitVisiteur = $pdo->getLesFraisHorsForfait(  $unVisiteur, "202212");
        
        //var_dump($fraisHorsForfaitVisiteur);
        include 'vues/v_detailFicheValidee.php';
        
        break;

    case "selectionnerFiche":
        $unVisiteur = filter_input(INPUT_GET, 'idvisiteur', FILTER_SANITIZE_ENCODED);
        $ficheFrais=$pdo->getFicheFrais();
       
        include 'vues/v_selectionnerFiche.php';
        break;

    case 'misePaiementFiche':
        $mois = filter_input(INPUT_POST, 'mois', FILTER_SANITIZE_ENCODED);
        $unVisiteur = filter_input(INPUT_GET, 'visiteur', FILTER_SANITIZE_ENCODED);
        $pdo->majEtatFicheFrais($unVisiteur,'202212',"MP");
    
        include 'vues/v_fiche_mise_en_paiement.php';
       
        break;

    case 'remboursee':
        $mois = filter_input(INPUT_POST, 'mois', FILTER_SANITIZE_ENCODED);
        $unVisiteur = filter_input(INPUT_GET, 'visiteur', FILTER_SANITIZE_ENCODED);
        $pdo->majEtatFicheFrais($unVisiteur,'202212',"RB");
        include 'vues/v_frais_rembourses.php';
        break;    
 

}

