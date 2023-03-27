<?php
/**
 * Gestion de la connexion
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
//recupere ce qui a été saisi dans l'url


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_ENCODED);
//si l'action saisi dans l url est differente de celle contenue dans la variable uc  alors uc est initialisé a demande connexion
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
    // le cas ou l action sur l url est demandeconnexion:la vue connexion est affichée a l'écran utilisateur donc par défaut
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
    //dans le cas ou on veut verifier si la connexion est valide,on recupere le login et le mdp entré dans le formulaire 
    //et on les compare avec ceux enregistrés dans la base de données 
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_ENCODED);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_ENCODED);
    
    //verifie que tout est correct en comparant avec les donnees de la bdd
    $visiteur = $pdo->getInfosVisiteur($login, $mdp);
    
    
    //si ce qui est renseigné est different des donnees contenues dans le  tableau de la variable visiteur cité plus haut,on affiche erreur
    //le tableau est vide
    if (!is_array($visiteur)) {
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
        // sinon ,on aplique la methode connecter cad qu on connecte le visiteur
    } else {
        $id = $visiteur['id'];
        $nom = $visiteur['nom'];
        $prenom = $visiteur['prenom'];
        $type= $visiteur['type'];
        $fonction= $visiteur['fonction'];
       

        //enregistre les infos dans une session visiteur
        connecter($id, $nom, $prenom,$type,$fonction);
        //qd le visieur est connecte,revient au routeur qui va le rediriger vers la page d acceuil
        //les donnees recuperees dans la page connexion ne sont plus visibles par ex ds le cas d un echo
   
       header('Location: index.php');
    }
    break;
    //par defaut,si rien n est renseigner,on affiche la vue de connexion
default:
    include 'vues/v_connexion.php';
    break;


}
