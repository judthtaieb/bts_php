
<div id="accueil">
    <h2>
        Gestion des frais<small> 
            <?php 
            echo ' -'.$_SESSION['fonction'] .': '.$_SESSION['prenom']. ' ' . $_SESSION['nom']
            ?></small>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span>
                    Navigation
                </h3>
            </div>
            
            <div class="panel-body">
            
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <a href="index.php?uc=validerFrais&action=validerFicheFrais"
                           class="btn btn-success btn-lg" role="button">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <br>Valider fiche de frais </a>
                        <a href="index.php?uc=suivrePaiementFicheFrais&action=selectionnerFiche"
                           class="btn btn-primary btn-lg" role="button">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            <br>Suivre paiement fiche de frais</a>
                    </div>
                </div>
            </div>
            
            

        </div>
    </div>
</div>