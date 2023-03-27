<?php
/**
 * Gestion de l'affichage des frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
// on stocke dans la variable idvisiteur le idvisiteur 
//recuperé dans le tableau session cree lors de la connexion(fonction connecter)
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
    //dans le cas ouù l'utilisateur sélectionne le mois 
case 'selectionnerMois':
    //on stocke dans une variable les mois disponibles enregistrés en base de données selon l'id du visiteur
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);

    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
    // on demande toutes les clés, et on prend la première,
    // les mois étant triés décroissants
    $lesCles = array_keys($lesMois);
    //recupere la valeur de la cle indicee 0 dans le tableau des cles cad ici $mois
    $moisASelectionner = $lesCles[0];
    include 'vues/v_listeMois.php';
    break;
    //dans le cas où l'utlisateur appuie pour voir l'etat de ses frais
case 'voirEtatFrais':
    //le input post récupère les données saisies via le formulaire pour l'inscrire dans la base de données
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_ENCODED);
    $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
    $moisASelectionner = $leMois;
    include 'vues/v_listeMois.php';
    //$lesFraisHF récupére le idvisiteur et le mois saisis dans la page fraisHF et inscrits dans la base de données
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
    //permet de retourner les 4 premiers caractères de la variable lemois
    $numAnnee = substr($leMois, 0, 4);
    //affiche les 2 caracteres située   apres les 4 premiers chiffres
    $numMois = substr($leMois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    include 'vues/v_etatFrais.php';
}
