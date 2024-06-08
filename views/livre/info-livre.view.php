<?php if (isset($_GET['id']) && $livre) : ?>
    <div class="card col-md-8 mx-auto mt-5">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php echo Config::base_url("public/imgs/uploads/{$livre->getImage()}"); ?>" alt="<?php echo $livre->getTitre(); ?>" title="<?php echo $livre->getTitre(); ?>" class="img-fluid" loading="lazy" />
                </div>
                <div class="col-md-8">
                    <h2 class="card-title text-center font-weight-bolder mt-3 mb-4">Fiche livre</h2>
                    <ul class="lead mb-5">
                        <li> <span class="font-weight-bold font-italic">ID</span> : <?php echo $livre->getId(); ?></li>
                        <li> <span class="font-weight-bold font-italic">Titre</span> : <?php echo $livre->getTitre(); ?></li>
                        <li> <span class="font-weight-bold font-italic">Auteur</span> : <?php echo $livre->getAuteur(); ?></li>
                        <li> <span class="font-weight-bold font-italic">Date d'édition</span> : <?php echo $livre->getDateEdition(); ?></li>
                    </ul>
                    <a href="<?php echo Config::site_url(); ?>" class="btn btn-outline-secondary float-right mt-5"><i class="fas fa-arrow-circle-left fa-sm fa-fw"></i> Retour</a>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php PageController::errorPage(); ?>
<?php endif; ?>