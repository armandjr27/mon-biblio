<!-- Notification pour l'ajout -->
<?php if (isset($_SESSION['added'])) :?>
    <div class="alert alert-info alert-dismissible fade show alert-msg">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $_SESSION['added'] ?></strong>
    </div>
<?php 
    unset($_SESSION['added']);
    endif;
?>

<!-- Notification pour la mise à jour -->
<?php if (isset($_SESSION['updated'])) :?>
    <div class="alert alert-success alert-dismissible fade show alert-msg">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $_SESSION['updated'] ?></strong>
    </div>
<?php 
    unset($_SESSION['updated']);
    endif;
?>

<!-- Notification pour la suppression -->
<?php if (isset($_SESSION['deleted'])) :?>
    <div class="alert alert-danger alert-dismissible fade show alert-msg">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $_SESSION['deleted'] ?></strong>
    </div>
<?php 
    unset($_SESSION['deleted']);
    endif;
?>

<h1 class="text-center">Liste de tous les livres</h1>

<div class="card shadow">
    <div class="card-header">
        <a 
            href="<?php echo Config::site_url('?p=ajout-livre'); ?>" 
            class="btn btn-outline-success btn-sm shadow">
            <i class="fa fa-plus"></i> Ajouter livre
        </a>
    </div>
    <div class="card-body">
        <input type="search" name="search-php" id="search-php" placeholder="  Search ..." class="form-control form-control-sm w-25 ml-auto font-weight-bold" />
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered my-3 text-center">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Image</th>
                    <th class="text-left">Titre</th>
                    <th class="text-left">Auteur</th>
                    <th>Date d'édition</th>
                    <th>Action</th>
                </thead>
                <tbody id="liste-livre">
                    <?php foreach ($livres as $livre) : ?>
                        <tr>
                            <td><?php echo $livre->getId(); ?></td>
                            <td><img src="<?php echo Config::base_url("public/imgs/uploads/{$livre->getImage()}"); ?>" alt="<?php echo $livre->getTitre(); ?>" title="<?php echo $livre->getTitre(); ?>" height="110" loading="lazy"/></td>
                            <td class="text-left" id="tr-titre"><?php echo $livre->getTitre(); ?></td>
                            <td class="text-left"><?php echo $livre->getAuteur(); ?></td>
                            <td><?php echo $livre->getDateEdition(); ?></td>
                            <td>
                                <a 
                                    href="<?php echo Config::site_url('?p=update-livre&amp;id='. $livre->getId()); ?>" 
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <a 
                                    href="<?php echo Config::site_url('?p=delete-livre&amp;id='. $livre->getId()); ?>" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>