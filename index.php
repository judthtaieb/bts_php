<?php
/**
 * Index du projet GSB
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


require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';
session_start();

$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
require 'vues/v_entete_header.php';

if (estConnecte()){
    require 'vues/v_entete_connecte.php';
}

/*recupere dans la variable $uc la variable uc saisie dans l url;la fonction filter_input permet de filtrer la saisie pour eviter les erreurs et retire les alphanumeriques  */
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_ENCODED);

//cas 1:si le uc existe et que l utilisateur n est pas connecte,ramene a la page connexion
if ($uc && !$estConnecte) {
    
    $uc = 'connexion';
    
//cas 2: l utilisateur est connecte et uc est vide,ramene a la page acceuil 
} elseif (empty($uc)) {
    $uc = 'accueil';
    
}
//prend les differents cas de uc
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
   
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
case 'validerFrais':
    
    include 'controleurs/c_validerFrais.php';
    break;    
case 'suivrePaiementFicheFrais':
    include 'controleurs/c_paiementFicheFrais.php';
    break;
}

require 'vues/v_pied.php';
