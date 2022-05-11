<div class="container py-5">
    <div class="row">

        <!-- SOMMAIRE -->
        <div class="col-12 col-md-3 bg-success text-dark bg-opacity-25 border border-dark">
            <h2 class="text-center fs-1 border-bottom border-dark py-1">Sommaire</h2>
            <div class="py-1"></div>
            <!-- <h3 class="fs-3 text-success">Visiteur :<br><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h3> -->
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
            <h2 class="text-center py-3 fs-1">Bonjour, <span class="text-success text-decoration-underline"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></span></h2>
            <h3 class="text-center py-2 fs-2">Bienvenue sur votre espace personnel !</h3>
            <!-- <h3 class="text-center py-3 fs-3">Votre dernire date de connexion était le :<br><?php echo $_SESSION['dernierDateConnexion']; ?></span></h3> -->
        </div>
    </div>
</div>