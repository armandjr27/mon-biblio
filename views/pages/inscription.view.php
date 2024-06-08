<h2 class="text-center my-3">Inscription</h2>

<div class="card col-md-5 mx-auto mb-5">
    <div class="card-body">
        <form method="POST" id="form-inscription">
            <p class="text-info lead text-center border-bottom p-1">Tous les champs sont obligatoire!</p>
            <div class="form-group">
                <label for="prenom" class="font-weight-bold">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="votre prénom">
                <span class="text-danger" id="error-prenom"></span>
            </div>
            <div class="form-group">
                <label for="nom" class="font-weight-bold">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="votre nom">
                <span class="text-danger" id="error-nom"></span>
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="user@mail.com">
                <span class="text-danger" id="error-email"></span>
            </div>
            <div class="form-group">
                <label for="naissance" class="font-weight-bold">Date de naissance</label>
                <input type="date" class="form-control" id="naissance" name="naissance">
                <span class="text-danger" id="error-naissance"></span>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Genre</label><br />
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="genre" value="homme" >Homme
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="genre" value="femme" >Femme
                    </label>
                </div><br/>
                <span class="text-danger" id="error-genre"></span>
            </div>
            <div class="form-group">
                <label for="pass" class="font-weight-bold">Mot de passe</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="votre mot de passe">
                <span class="text-danger" id="error-pass"></span>
            </div>
            <div class="form-group">
                <label for="repass" class="font-weight-bold">Confirmer mot de passe</label>
                <input type="password" class="form-control" name="repass" id="repass" placeholder="confirmer votre mot de passe">
                <span class="text-danger" id="error-repass"></span>
            </div>
            <button type="submit" class="btn btn-primary my-3" id="inscription" name="inscription">S'inscrire</button>
        </form>
    </div>
</div>