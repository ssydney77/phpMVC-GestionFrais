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
            <div class="border border-dark border-1">
                <h2 class="text-start fs-1 border-bottom border-dark border-1 bg-success bg-opacity-25 py-1">Mes fiches de frais</h2>
                <h3 class="text-start fs-2">Mois à sélectionner : </h3>
                <form action="mon-espace/mes-fiches-de-frais/afficher-fiches" method="post">
                <p class="text-center">
                    <label for="mois_selec" accesskey="n" class="fs-3">Mois : </label>
                    <select id="lstMois" name="mois_selec" class="fs-5">
                    <?php
                    foreach ($lesMois as $unMois){
                        $mois = $unMois->mois;
                        $numAnnee = substr($mois, 0, 4);
                        $numMois = substr($mois, 4, 2);
                        if($mois == $moisASelectionner){
                    ?>
                        <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                    <?php 
                        }
                        else{
                    ?>
                        <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                    <?php 
                        }
                    }
                    ?>    
                    </select>
                </p>
                <p class="text-center fs-5">
                    <input id="ok" type="submit" value="Valider" size="20" />
                    <input id="annuler" type="reset" value="Effacer" size="20" />
                </p> 

                    
                </form>
            </div>
        </div>                
    </div>
</div>