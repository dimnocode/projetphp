<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajout/Modification de livre</h4>
            </div>
            <div class="modal-body">

                <form id="lform">
                    <input type="hidden" name="LivreID" id="LivreIDInput">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titreInput" name="titre" placeholder="Titre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Code">Auteur</label>
                        <input type="text" class="form-control" id="auteurInput" name="auteur" placeholder="Auteur" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Prix unitaire</label>
                        <input type="number" class="form-control" id="prix_unitaireInput" name="prix_unitaire" placeholder="Prix unitaire" required>
                    </div>
                                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="actifCheck" name="actif"> Actif
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="btModalAjoutPanier">Ajouter au panier</button>
                <button type="button" id="btclose" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="button" id="saveLivre" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>