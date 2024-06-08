<?php if(isset($page) && $page !== 'Users' && $page !== 'Livres' && $page !== 'Livre' && $page !== 'Livre-by-key' && $page !== 'Save-livre-by-ajax' && $page !== 'Delete-livre-by-ajax') : ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Biblio <?php echo (isset($page)) ? "| " . $page : ""; ?></title>
    <link rel="stylesheet" href="<?php echo Config::base_url('public/assets/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo Config::base_url('public/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo Config::base_url('public/assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?php echo Config::base_url('public/assets/css/alert-style.css'); ?>">
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php echo Config::site_url(); ?>"><i class="fas fa-book-open"></i> Mon Biblio</a>

            <!-- Toggler/collapsible Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= isset($page) && $page === 'Accueil' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo Config::base_url('index.php?p=accueil'); ?>"><i class="fa fa-home"></i> Accueil</a>
                    </li>
                    <li class="nav-item <?= isset($page) && $page === 'About' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?php echo Config::base_url('index.php?p=about'); ?>"><i class="fa fa-address-card"></i> About</a>
                    </li>
                    <?php if(isset($_SESSION['online']) && $_SESSION['online']) : ?>
                        <li class="nav-item <?= isset($page) && $page === 'Liste-livres' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?php echo Config::base_url('index.php?p=liste-livres'); ?>"><i class="fa fa-list-ol"></i> Liste livres</a>
                        </li>
                        <li class="nav-item <?= isset($page) && $page === 'Liste-livres-by-ajax' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?php echo Config::base_url('index.php?p=liste-livres-by-ajax'); ?>"><i class="fa fa-list"></i> Liste livres by Ajax</a>
                        </li>
                        <li class="nav-item <?= isset($page) && $page === 'Déconnexion' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?php echo Config::base_url('index.php?p=deconnexion'); ?>"><i class="fa fa-address-card"></i> Déconnexion</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item <?= isset($page) && ($page === 'Connexion' OR $page === 'Inscription') ? 'active' : '' ?>">
                            <a class="nav-link" href="<?php echo Config::base_url('index.php?p=connexion'); ?>"><i class="fa fa-cog"></i> Connexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <?php echo $content ;?>
    </main>

    <footer class="my-3">
        <div class="container-fluid">
            <p class="text-center">&copy; Copyright <?php echo Date("Y"); ?> Armand Jr.</p>
        </div>
    </footer>

    <script src="<?php echo Config::base_url('public/assets/js/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo Config::base_url('public/assets/js/bootstrap.bundle.js'); ?>"></script>
    <script src="<?php echo Config::base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
    <script type="module" src="<?php echo Config::base_url('public/assets/js/app.js'); ?>"></script>
    <?php if(isset($page) && $page === 'Liste-livres-by-ajax') :?>
        <script src="<?php echo Config::base_url('public/assets/js/ajax-function.js'); ?>"></script>
    <?php endif;?>
    <?php if(isset($page) && $page === 'Inscription') :?>
        <script src="<?php echo Config::base_url('public/assets/js/user-validation.js'); ?>"></script>
    <?php endif;?>
</body>

</html>
<?php else : ?>
    <?php echo $content ;?>
<?php endif; ?>