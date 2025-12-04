<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<div>
    <h2 class="text-warning">
        Suivre la fiche de frais
    </h2>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="index.php?uc=suivrepaiement&action=selectionnerMois" 
              method="post">
            <div class="mb-3">
                <label for="visiteur" class="form-label" accesskey="n">Visiteur :</label>
                <select id="visiteur" name="visiteur" class="form-select">
                        <option selected value="">
                                    -Selectionner-
                                </option>
                    <?php
                        foreach ($lesVisiteurs as $unVisiteur) {
                            if ($unVisiteur == $visiteurASelectionner) {
                                ?>
                                <option selected value="<?php echo $unVisiteur['id'] ?>">
                                    <?php echo $unVisiteur['nom'] . ' ' . $unVisiteur['prenom'] ?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $unVisiteur['id'] ?>">
                                    <?php echo $unVisiteur['nom'] . ' ' . $unVisiteur['prenom'] ?>
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