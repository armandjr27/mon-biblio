<div class="modal fade" id="info-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info text-light">
                <h3 class="modal-title">Fiche livre</h3>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="info-card-img" class="img-fluid" loading="lazy"/>
                    </div>
                    <div class="col-md-8">
                        <h2 class="card-title text-center font-weight-bolder mt-3 mb-4">Livre n°<span id="numero-livre"></span></h2>
                        <ul class="lead mb-5">
                            <li> <span class="font-weight-bold font-italic">ID</span> : <span id="li-id"></span></li>
                            <li> <span class="font-weight-bold font-italic">Titre</span> : <span id="li-titre"></span></li>
                            <li> <span class="font-weight-bold font-italic">Auteur</span> : <span id="li-auteur"></span></li>
                            <li> <span class="font-weight-bold font-italic">Date d'édition</span> : <span id="li-date-edition"></span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-info" data-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>