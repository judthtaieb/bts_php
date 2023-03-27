<?php
/**
 * Gestion de la déconnexion
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
if (!$uc) {
    $uc = 'demandeconnexion';
}
//lrsque l utilisateur appuie sur decnnexion,il est redirigé sur la page de deconnexion
switch ($action) {
case 'demandeDeconnexion':
    include 'vues/v_deconnexion.php';
    break;
case 'valideDeconnexion':
    if (estConnecte()) {
        include 'vues/v_deconnexion.php';
        //si l utilisateur n est pas connecte mais appuie sur deconnexion affiche une erreur
    } else {
        ajouterErreur("Vous n'êtes pas connecté");
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    }
    break;
    //par defaut ,il reste sur la page de connexion 
default:
    include 'vues/v_connexion.php';
    break;
}
