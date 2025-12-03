<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<hr>
<div>
    <h2> Etat Fiche : <?php echo $libEtat;?></h2> 
</div>
<div class="card card-info">
    <div class="card-header bg-warning text-white">Eléments forfaitisés</div>
    <div class="card-body">
        <table class="table table-bordered table-responsive">
                <tr>
                    <?php
                    foreach ($lesFraisForfait as $unFraisForfait) {
                        $libelle = $unFraisForfait['libelle'];
                        ?>
                        <th> <?php echo htmlspecialchars($libelle) ?></th>
                        <?php
                    }
                    ?>
                </tr>
                <tr>

                    <?php
                    foreach ($lesFraisForfait as $unFraisForfait) {
                        $quantite = $unFraisForfait['quantite'];
                        ?>
                        <td class="qteForfait"><?php echo $quantite ?></td>
                        <?php
                    }
                    ?>

                </tr>
            </table>
    </div>
</div>

<br>

<div class="card card-info">
    <div class="card-header bg-warning text-white">Descriptif des éléments hors forfait</div>
    <div class="card-body">


        <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
        <input type="hidden" name="mois" value="<?php echo $leMois ?>">
        <table class="table table-bordered table-responsive">
            <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>                
            </tr>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {

                $idFraisHorsForfait = $unFraisHorsForfait['id'];
                $date = $unFraisHorsForfait['date'];
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $montant = $unFraisHorsForfait['montant'];
                ?>
                <form method="post" action="index.php?uc=validerFrais&action=majFraisHorsForfait" onsubmit="return confirm('Voulez-vous valider les changements ?');">
                      <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
                      <input type="hidden" name="mois" value="<?php echo $leMois ?>">
                      <input type="hidden" name="idFraisHors" value="<?php echo $idFraisHorsForfait ?>">
                    <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                    </tr>

                </form>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<br>

<form method="post" action="index.php?uc=suivrepaiement&action=rembourserFrais" onsubmit="return confirm('Voulez-vous valider les changements ?');">
    <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
    <input type="hidden" name="mois" value="<?php echo $leMois ?>"> 
    <button class="btn btn-success" type="submit">Rembourser</button>
</form>