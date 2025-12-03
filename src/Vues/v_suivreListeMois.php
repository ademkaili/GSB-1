<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<div class="row">
    <div class="col-md-4">
        <form action="index.php?uc=suivrepaiement&action=afficherFrais" 
              method="post" role="form">

            <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">

            <div class="mb-3">
                <label for="mois" class="form-label" accesskey="n">Mois : </label>
                <select id="mois" name="mois" class="form-select">


                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?>
                            </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <button id="ok" type="submit" class="btn btn-success">Valider</button>
            <button id="annuler" type="reset" class="btn btn-danger">Effacer</button>
        </form>
    </div>
</div>