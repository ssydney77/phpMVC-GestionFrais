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
        <div class="col-12 col-md-9">
            <div class="border border-dark">
                <h2 class="text-start fs-1 py-1 border-bottom border-dark bg-success bg-opacity-25">Fiche de frais du mois <?php echo $numMois."-".$numAnnee; ?> : </h2>
                <?php 
                foreach ($info as $unFrais){
                    $libEtat = $unFrais->libEtat;
                    $dateModif = $unFrais->dateModif;
                    $montantValide = $unFrais->montantValide;
                    $nbJustificatifs = $unFrais->nbJustificatifs;
                }
                ?>
                <p class="text-start fs-5">
                    Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>                     
                </p>
                <div class="py-1">
                </div>    
                <div class="p-2">
                    <h3 class="fs-2">Eléments forfaitisés</h3>
                    <div class="py-1">
                    </div>
                    <table class="table table-bordered border-dark text-center">
                        <thead>
                            <tr class="fs-4 table-success border-dark">
                            <?php
                            foreach ($fraisForfait as $unFraisForfait ){
                                $libelle = $unFraisForfait->libelle;
                            ?>	
                                <th scope="col"> <?php echo $libelle?></th>
                            <?php
                            }
                            ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="fs-5">
                            <?php
                            foreach ($fraisForfait as $unFraisForfait){
                                $quantite = $unFraisForfait->quantite;
                            ?>
                                <td class="fs-5 table-light border-dark"><?php echo $quantite?></td>
                            <?php
                            }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-2">
                    <h3 class="fs-2">Descriptif des éléments hors forfait - <?php echo $nbJustificatifs ?> justificatifs reçus -</caption>
                    <div class="py-1">
                    </div>
                    <table class="table table-bordered border-dark text-center">
                        <thead>
                            <tr class="fs-4 table-success border-dark">
                                <th scope="col">Date</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php      
                        foreach ( $fraisHorsForfait as $unFraisHorsForfait ){
                            $date = $unFraisHorsForfait->date;
                            $libelle = $unFraisHorsForfait->libelle;
                            $montant = $unFraisHorsForfait->montant;
                        ?>
                            <tr>
                                <td class="fs-5 table-light border-dark"><?php echo $date ?></td>
                                <td class="fs-5 table-light border-dark"><?php echo $libelle ?></td>
                                <td class="fs-5 table-light border-dark"><?php echo $montant ?></td>  
                            </tr>
                        <?php 
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>