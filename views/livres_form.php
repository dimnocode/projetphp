<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajout/Modification de livre</h4>
            </div>
            <div class="modal-body">

                <form id="lform">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
                    </div>
                    
                    <div class="form-group">
                        <label for="Code">Auteur</label>
                        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Prix unitaire</label>
                        <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" placeholder="Prix unitaire">
                    </div>
                                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="actif" name="actif"> Actif
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="saveUtilisateur" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>