<h1 class="text-center">Liste livres</h1>

<input type="search" name="search-card" id="search-card" placeholder="  Search ..." class="form-control form-control-sm w-25 ml-auto font-weight-bold mb-4" />

<div class="row" id="card-livre">
    <?php foreach ($livres as $livre) : ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body" style="height:250px;">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?php echo Config::base_url("public/imgs/uploads/{$livre->getImage()}"); ?>" alt="<?php echo $livre->getTitre(); ?>" title="<?php echo $livre->getTitre(); ?>" class="img-fluid" loading="lazy" />
                        </div>
                        <div class="col-8">
                            <h4 class="card-title font-weight-bolder mb-5"><?php echo $livre->getTitre(); ?></h4>
                            <p class="card-text mb-4">
                                C'est un livre écrit par <strong><?php echo $livre->getAuteur(); ?></strong>, et a été publié en <strong><?php echo date_format(date_create($livre->getDateEdition()), "Y"); ?></strong>.
                            </p>
                            <a href="<?php echo Config::site_url('?p=info-livre&amp;id=' . $livre->getId()); ?>" class="btn btn-primary btn-block btn-sm">Plus d'info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>