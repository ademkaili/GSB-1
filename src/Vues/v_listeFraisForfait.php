<?php

/**
 * Vue Liste des frais au forfait
 *
 * PHP Version 8
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 * @link      https://getbootstrap.com/docs/5.3/ Documentation Bootstrap v5
 */

?>
<div class="row">    
    <h2>Renseigner ma fiche de frais du mois 
        <?php echo $numMois . '-' . $numAnnee ?>
    </h2>
    <h3>Eléments forfaitisés</h3>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=gererFrais&action=validerMajFraisForfait" 
              role="form">
            <fieldset>       
                <?php
                foreach ($lesFraisForfait as $unFrais) {
                    $idFrais = $unFrais['idfrais'];
                    $libelle = htmlspecialchars($unFrais['libelle']);
                    $quantite = $unFrais['quantite']; ?>
                    <div class="mb-3">
                        <label for="idFrais" class="form-label"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               size="10" maxlength="5" 
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </div>
                    <?php
                }
                ?>
                <div class="mb-3">
                    <label for="vehicule" class="form-label">Puissance du véhicule :</label>
                    <select name="vehicule" id="vehicule" class="form-select" required>
                        <option disabled selected>— Choisissez un véhicule —</option>

                        <option value="1">Véhicule 4CV Diesel : 0.52 € / Km</option>
                        <option value="2">Véhicule 5/6CV Diesel : 0.58 € / Km</option>
                        <option value="3">Véhicule 4CV Essence : 0.62 € / Km</option>
                        <option value="4">Véhicule 5/6CV Essence : 0.67 € / Km</option>
                    </select>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $idVehicule = $_POST['vehicule'];
                }
                ?>
                </div>
                <button class="btn btn-success" type="submit">Ajouter</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>