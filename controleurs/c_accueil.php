<?php
/**
 * Gestion de l'accueil
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

// si l'utilisateur est connecté ,il est ramené à la page d'acceuil ;sinon affiche la page connnexion
if ($estConnecte) {
    if ($_SESSION['type']== 1) 
        include 'vues/v_accueil.php';
    
    if ($_SESSION['type']== 2)  
        include 'vues/v_acceuil_compta.php'; 
      
}
else {
    include 'vues/v_connexion.php';
}
