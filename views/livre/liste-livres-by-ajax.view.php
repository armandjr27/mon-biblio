<?php 
    require_once dirname(__DIR__) . '/modal/formulaire-livre-modal.view.php';
    require_once dirname(__DIR__) . '/modal/info-livre-modal.view.php';
    require_once dirname(__DIR__) . '/modal/confirm-modal.view.php';
?>

<h1 class="text-center">Liste de tous les livres</h1>

<div class="card shadow">
    <div class="card-header">
        <button type="button" class="btn btn-outline-success btn-sm shadow" data-toggle="modal" data-target="#form-modal" id="ajout"><i class="fa fa-plus"></i> Ajouter livre</button>
    </div>
    <div class="card-body">
        <input type="search" name="search-ajax" id="search-ajax" placeholder="  Search ..." class="form-control form-control-sm w-25 ml-auto font-weight-bold" />
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
                                <button 
                                    type="button" class="btn btn-info btn-sm" 
                                    data-toggle="modal" data-target="#info-modal" 
                                    onclick="showLivre(<?php echo $livre->getId(); ?>)">
                                    <i class="fa fa-eye"></i> Afficher
                                </button>
                                <button 
                                    type="button" class="btn btn-success btn-sm" 
                                    data-toggle="modal" data-target="#form-modal" 
                                    onclick="editLivre(<?php echo $livre->getId(); ?>)">
                                    <i class="fa fa-edit"></i> Modifier
                                </button>
                                <button 
                                    type="button" class="btn btn-danger btn-sm" 
                                    data-toggle="modal" data-target="#delete-modal" 
                                    onclick="deleteLivre(<?php echo $livre->getId(); ?>)">
                                    <i class="fa fa-trash"></i> Supprimer
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Notification pour l'ajout -->
<div class="alert alert-info alert-msg font-weight-bold" id="alert-msg-add"></div>

<!-- Notification pour la mise à jour -->
<div class="alert alert-success alert-msg font-weight-bold" id="alert-msg-update"></div>

<!-- Notification pour la suppression -->
<div class="alert alert-danger alert-msg font-weight-bold" id="alert-msg-delete"></div>