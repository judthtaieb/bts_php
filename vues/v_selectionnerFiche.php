
<h2>Suivi paiement fiche frais</h2>

<h3>Sélectionner une fiche de frais : </h3>
<!--<form action="index.php?uc=suivrePaiementFicheFrais&action=detailFicheValidee&idvisiteur=<?php echo $uneFicheFrais['idvisiteur'] ?>" method="post" role="form">
    <div class="form-group">
        <select name="ficheFrais" id ="fiche" class="form-select" aria-label="Default select example">
        <?php foreach ($ficheFrais as $uneFicheFrais) { ?>
                <option value =" <?php echo $uneFicheFrais['idvisiteur'].$uneFicheFrais['mois']?>"> <?php echo $uneFicheFrais['nom']. " ".$uneFicheFrais['prenom']." ".$uneFicheFrais['mois'] ?></option>
            <?php
            }
            ?>
           
        </select>
        <a href="index.php?uc=suivrePaiementFicheFrais&action=detailFicheValidee&idvisiteur=<?php echo $uneFicheFrais['idvisiteur']?>"> 
        <input id="selec" type="submit" value="Selectionner" class="btn btn-primary" role="button"></a>
    </div>
    
</form> 
        -->                                                                                                                                              
<br>   
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Liste des fiches de frais</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">id visiteur</th>
                    <th class="mois">mois</th> 
                    <th class="action">Detail</th> 
                </tr>
            </thead>  
            <tbody>
            <?php foreach ($ficheFrais as $uneFicheFrais) { ?>
                
                    
                <tr>
                    <td> <?php echo $uneFicheFrais['idvisiteur'] ?></td>
                    <td> <?php $uneFicheFrais['mois'] ?></td>
                    <td><a href="index.php?uc=suivrePaiementFicheFrais&action=detailFicheValidee&idvisiteur=<?php echo $uneFicheFrais['idvisiteur']?>"> 
                           Fiches de frais </a></td>
                </tr>
                <?php
            }
           
            ?>
            </tbody>  
        </table>
    </div>
</div>



