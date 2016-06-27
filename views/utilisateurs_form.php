<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajout/Modification utilisateur</h4>
            </div>
            <div class="modal-body">
               
                    <form id="uform">
                        <div id="alertZone"></div>
                        
                        <div class="form-group">
                            <label for="utilisateur">Utilisateur</label>
                            <input type="text" class="form-control" id="utilisateurInput" name="utilisateur" placeholder="Utilisateur" pattern=".{4,}" required>
                            <p class="help-block">Minimum 4 caractères</p>
                        </div>

                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="codeInput" name="code" placeholder="Code" required>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nomInput" name="nom" placeholder="Nom" pattern=".{4,}" required>
                            <p class="help-block">Minimum 4 caractères</p>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenomInput" name="prenom" placeholder="Prénom" pattern=".{4,}" required>
                            <p class="help-block">Minimum 4 caractères</p>
                        </div>
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="adminCheck" name="admin"> Admin
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="actifCheck" name="actif"> Actif
                            </label>
                        </div>


                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="button" id="saveUtilisateur" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>