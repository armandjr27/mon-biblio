<div class="modal fade" id="form-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-success text-light">
                <h4 class="modal-title">Formulaire livre</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du livre" required>
                    </div>
                    <div class="form-group">
                        <label for="auteur">Auteur</label>
                        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur du livre" required>
                    </div>
                    <div class="form-group">
                        <label for="date_edition">Date d'édition</label>
                        <input type="date" class="form-control" id="date_edition" name="date_edition" placeholder="Date d'édition du livre" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file border" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <div class="float-right mt-2 mb-4">
                            <button type="submit" class="btn btn-success" id="save">Sauver livre</button>
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>