<h2 class="text-center my-3">Connexion</h2>

<div class="card col-md-5 mx-auto">
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label for="email" class="font-weight-bold">E-mail </label>
                <input type="email" class="form-control" name="email" id="email" placeholder="user@mail.com" 
                value="<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : (isset($_COOKIE['email']) ?  $_COOKIE['email']:  ""); ?>">

                <?php if (isset($_SESSION['error_mail'])) : ?>
                    <span class="text-danger"><?php echo $_SESSION['error_mail'] ?></span>
                <?php
                    unset($_SESSION['error_mail']);
                    endif;
                ?>
            </div>
            <div class="form-group">
                <label for="pass" class="font-weight-bold">Mot de passe </label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="votre mot de passe">
                <?php if (isset($_SESSION['error_pass'])) : ?>
                    <span class="text-danger"><?php echo $_SESSION['error_pass'] ?></span>
                <?php
                    unset($_SESSION['error_pass']);
                    endif;
                ?>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="email_cookie"> Souvenir de moi <span class="text-muted">(optional)</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name="connexion">Se connecter</button>
        </form>
    </div>
</div>

<p class="text-center text-light mx-auto my-4 border shadow rounded-circle bg-dark" style="width:28px;height:28px;">ou</p>

<p class="text-center mb-5">Veuillez-vous <a href="<?php echo Config::site_url('?p=inscription') ?>">inscrire</a>, si vous n'avez pas encore de compte?</p>

<!-- Notification pour l'ajout -->
<?php if (isset($_SESSION['added'])) : ?>
    <div class="alert alert-info alert-dismissible fade show alert-msg">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $_SESSION['added'] ?></strong>
    </div>
<?php
    unset($_SESSION['added']);
endif;
?>