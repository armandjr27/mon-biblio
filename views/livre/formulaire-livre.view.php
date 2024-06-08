<?php if(isset($_GET['id']) && ! $livre) : ?>
<?php PageController::errorPage(); ?>
<?php else : ?>
<div class="col-md-8 col-lg-5 mx-auto mt-2">
    <div class="card shadow">
        <div class="card-header bg-success text-light">
            <h2 class="card-title text-center">Formulaire</h2>
        </div>
        <div class="card-body">
            <form action="?p=save-livre" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo ($livre) ? $livre->getId() : ""; ?>">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du livre" required value="<?php echo ($livre) ? $livre->getTitre() : ""; ?>">
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur du livre" required value="<?php echo ($livre) ? $livre->getAuteur() : ""; ?>">
                </div>
                <div class="form-group">
                    <label for="date_edition">Date d'édition</label>
                    <input type="date" class="form-control" id="date_edition" name="date_edition" placeholder="Date d'édition du livre" required value="<?php echo ($livre) ? $livre->getDateEdition() : ""; ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file border" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-block btn-success mt-3 shadow" name="submit">Sauver livre</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>