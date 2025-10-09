<?php
?>
<div class="alert alert-warning" role="alert"><strong>
</div>
<div id="accueil">
    <h2>
        Gestion des frais<small class="text-muted"> - Visiteur : 
            <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></small>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card border-warning">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title">
                    <i class="bi bi-bookmark"></i>
                    Navigation
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 d-grid gap-2 d-md-block">
                        <a href="index.php?uc=gererFrais&action=saisirFrais"
                           class="btn btn-success btn-lg" role="button">
                            <i class="bi bi-pencil"></i>
                            <br>Valider fiche de frais</a>
                        <a href="index.php?uc=etatFrais&action=selectionnerMois"
                           class="btn btn-primary btn-lg" role="button">
                            <i class="bi bi-list-ul"></i>
                            <br>Suivre paiement</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>