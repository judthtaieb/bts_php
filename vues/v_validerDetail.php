
<hr>
<form method="post" action="index.php?uc=validerFrais&action=modifierForfait&visiteur=<?= $unVisiteur ?>" role="form">
<div class="panel panel-info">
    <div class="panel-heading">Eléments forfaitisés</div>
    <table class="table table-bordered table-responsive">
        <tr>
            <?php
            foreach ($fraisForfaitVisiteur as $unFraisForfaitVisiteur) {
                $libelle = $unFraisForfaitVisiteur['libelle']; ?>
                <th> <?php echo htmlspecialchars($libelle) ?></th>
                <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($fraisForfaitVisiteur as $unFraisForfaitVisiteur) {
                $quantite = $unFraisForfaitVisiteur['quantite'];
                $idFrais = $unFraisForfaitVisiteur['idfrais'];
                 ?>
                <td class="qteForfait"><?php echo $quantite ?> 
                <input class="form-control"name="<?php echo $idFrais ?>" value="<?php echo $quantite ?>" type="text" maxlength="45">
                </td>
                <?php
            }
            ?>
            
        </tr>
    </table>
          
    <input id="modif" type="submit" value="Modifier" class="btn btn-primary" role="button">
</div>
</form> 

<form method="post" action="index.php?uc=validerFrais&action=supprimerFraisHF&visiteur=<?= $unVisiteur ?>" role="form">
<div class="panel panel-info">
    <div class="panel-heading">Descriptif des éléments hors forfait </div>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>
            <th ></th>                
        </tr>
        <?php
        $i=1;
        foreach ($fraisHorsForfaitVisiteur as $unFraisHorsForfaitVisiteur) {
            $date = $unFraisHorsForfaitVisiteur['date'];
            $libelle = htmlspecialchars($unFraisHorsForfaitVisiteur['libelle']);
            $montant = $unFraisHorsForfaitVisiteur['montant'];
            $supprimer= $unFraisHorsForfaitVisiteur['id'];
            ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>

                <td>
                    <div class="form-check">
                    <input name="<?php echo 'id'.$i ?>"class="form-check-input" type="checkbox"
                     value ="<?php echo $supprimer  ?>" id="flexCheckDefault">
                   </div>
                </td>
            </tr>
            <?php
            $i++; 
        }
        ?>
    </table>
    <input id="supp" type="submit" value="Supprimer" class="btn btn-primary" role="button">
</div>
</form>

<a href = "index.php?uc=validerFrais&action=validerFiche&idvisiteur=<?php echo $unVisiteur?>">
<button id="ok" type="submit" value="Valider" class="btn btn-primary" role="button">Valider la fiche </button></a>

   