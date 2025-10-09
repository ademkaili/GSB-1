<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<div class="card card-info">
    <div class="card-header">Eléments forfaitisés</div>
    <div class="card-body">
        <table class="table table-bordered table-responsive">
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle']; ?>
                    <th> <?php echo htmlspecialchars($libelle) ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite']; ?>
                    <td class="qteForfait"><?php echo $quantite ?> </td>
                    <?php
                }
                ?>
            </tr>
        </table>
    </div>
</div>