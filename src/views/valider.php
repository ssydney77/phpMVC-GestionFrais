<div class="container py-5">
    <div class="row">

        <!-- SOMMAIRE -->
        <div class="col-12 col-md-3 bg-success text-dark bg-opacity-25 border border-dark">
            <h2 class="text-center fs-1 border-bottom border-dark py-1">Sommaire</h2>
            <div class="py-1"></div>
            <h3 class="fs-3 text-success">Visiteur :<br><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h3>
            <div class="row">
                <div class="col-4 col-md-12">
                    <h3 class="py-2 fs-4 fw-light"><a href="mon-espace/saisie-fiche-de-frais" class="text-success">Saisie fiche de frais</a></h4>
                </div>
                <div class="col-4 col-md-12">
                    <h3 class="py-2 fs-4 fw-light"><a href="mon-espace/mes-fiches-de-frais" class="text-success">Mes fiches de frais</a></h4>
                </div>
                <div class="col-4 col-md-12">
                    <h3 class="py-2 fs-4 fw-light"><a href="deconnecter" class="text-success">Déconnexion</a></h4>
                </div>
            </div>
        </div>
        
        <!-- Main content -->
        <div class="col-12 col-md-9 py-4 py-md-0">
            <h3 class="fs-2 text-center">Les données ont bien été enregistrer</h3>
            <p class="fs-5 text-center"><a href="mon-espace/saisie-fiche-de-frais" class="btn btn-success">Appuyer ici pour revenir en arrière</a></p>
        </div>
    </div>
</div>