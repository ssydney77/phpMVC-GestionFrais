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
                <h2 class="fs-1 border-bottom border-dark bg-success bg-opacity-25 py-1">Renseigner ma fiche de frais du <?php echo $numMois."-".$numAnnee ?></h2>
                <form method="POST" action="mon-espace/saisie-fiche-de-frais/valider-frais-forfait">
                    <div class="p-2">
                        <h3 class="text-start fs-2 py-2">Eléments forfaitisés</h3>
                        <?php
                        foreach ($fraisForfait as $unFrais){
                            $idFrais = $unFrais->idfrais;
                            $libelle = $unFrais->libelle;
                            $quantite = $unFrais->quantite;
                        ?>
                        <p class="text-start mx-5 fs-5">
                            <label for="idFrais"><?php echo "● ".$libelle ?></label>
                            <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
                        </p>
                        <?php
                            }
                        ?>
                        <div class="mx-5 fs-5">
                            <p>
                                <input id="ok" type="submit" value="Valider" size="20" />
                                <input id="annuler" type="reset" value="Effacer" size="20" />
                            </p> 
                        </div>
                    </div>
                </form>

                <!-- Vue Frais Hors Forfait -->
                <div class="p-2">                  
                    
                        <h3 class="fs-2 py-2">Descriptif des éléments hors forfait</h3>
                        <table class="table table-bordered text-center ">
                            <tr class="fs-4 table-success border-dark">
                                <th class="date">Date</th>
                                <th class="libelle">Libellé</th>  
                                <th class="montant">Montant</th>  
                                <th class="action">&nbsp;</th>          
                            </tr>
                            <?php    
                                foreach( $fraisHorsForfait as $unFraisHorsForfait) 
                                {
                                    $date = $unFraisHorsForfait->date;
                                    $libelle = $unFraisHorsForfait->libelle;
                                    $montant=$unFraisHorsForfait->montant;
                                    $id = $unFraisHorsForfait->id;
                            ?>		
                            <tr class="fs-5 border-dark">
                                <td><?php echo $date ?></td>
                                <td><?php echo $libelle ?></td>
                                <td><?php echo $montant ?></td>
                                <td>
                                    <form id="test" action="mon-espace/saisie-fiche-de-frais/supprimer" method="post">
                                    <input type="hidden" name="idFrais" value="<?php echo $id ?>"/>
                                    <input id="ok" type="submit" value="Supprimer" size="20" />
                                    </form>
                                    <!-- <a href="" onclick="document.getElementByID('test').submit()">Supprimer ce frais</a> -->
                                </td>
                            </tr>
                    
                        <?php		 
                            
                            }
                        ?>                              
                    </table>
                    
                </div>
                <form action="mon-espace/saisie-fiche-de-frais/ajouter-hors-forfait" method="post">
                    <div class="p-2">    
                        <h3 class="fs-2 py-2">Nouvel élément hors forfait</h3>
                        <div class="mx-5">
                            <p class="fs-5">
                                <label for="txtDateHF">● Date (jj/mm/aaaa) : </label>
                                <input type="date" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value=""  />
                            </p>
                            <p class="fs-5">
                                <label for="txtLibelleHF">● Libellé : </label>
                                <input type="text" id="txtLibelleHF" name="libelle" size="60" maxlength="256" value="" />
                            </p>
                            <p class="fs-5">
                                <label for="txtMontantHF">● Montant : </label>
                                <input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" />
                            </p>
                            <p class="fs-5">
                                <input id="ajouter" type="submit" value="Ajouter" size="20" />
                                <input id="effacer" type="reset" value="Effacer" size="20" />
                            </p>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>