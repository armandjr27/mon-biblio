<?php
session_start();

require_once 'controllers/PageController.class.php';
require_once 'controllers/LivreController.class.php';
require_once 'controllers/UserController.class.php';

$pageController  = new PageController();
$livreController = new LivreController();
$userController  = new UserController();

ob_start();

if (isset($_GET['p']))
{
    $page = strtolower($_GET['p']);
    $page = ucfirst($page);

    switch ($page) {
        /**
         * GESTION DES PAGES STATICS
         */
        case 'Accueil':
            $pageController->index();
            
            break;
        
        case 'About':
            $pageController->render($page);
            break;
        
        case 'Inscription':
            if (isset($_POST["inscription"])) 
            {
                $userController->signUp();
            }
            else
            {
                $pageController->render($page);
            }
            break;

        case 'Connexion':
            if (isset($_POST["connexion"])) 
            {
                $userController->signIn();
            }
            else
            {
                $pageController->render($page);
            }
            break;

        case 'Deconnexion':
            $userController->signOut();
            break;

        /**
         * GESTION DES LIVRES EN PHP
         * Create, Read, Update, Delete
         */
        case 'Liste-livres':
            $livreController->showAll();
            break;

        case 'Info-livre':
            $livreController->showBook();
            break;

        case 'Ajout-livre':
            $livreController->showBookForm();
            break;

        case 'Update-livre':
            if ($_GET['id'])
            {
                $livreController->showBookForm($_GET['id']);
            }
            else
            {
                $pageController->errorPage();
            }
            break;

        case 'Save-livre':
            if (! isset($_POST['id']))
            {
                $livreController->saveBook();
            }
            else
            {
                $livreController->saveBook($_POST['id']);
            }
            break;

        case 'Delete-livre':
            if (isset($_GET['id']))
            {
                $livreController->dropBook($_GET['id']);
            }
            else
            {
                $pageController->errorPage();
            }
            break;
        
        /**
         * GESTION DES LIVRES EN AJAX
         * Create, Read, Update, Delete
         */
        case 'Liste-livres-by-ajax':
            $livreController->showListeLivre();
            break;

        case 'Livres':
            $livreController->showAllByAjax();
            break;

        case 'Livre':
            $livreController->showBookByAjax();
            break;
        
        case 'Livre-by-key':
            $livreController->showBookByAjaxWithKey();
        break;

        case 'Save-livre-by-ajax':
            if (! isset($_POST['id']))
            {
                $livreController->saveBookByAjax();
            }
            else
            {
                $livreController->saveBookByAjax($_POST['id']);
            }
            break;

        case 'Delete-livre-by-ajax':
            if (isset($_GET['id']))
            {
                $livreController->dropBookByAjax($_GET['id']);
            }
            else
            {
                $pageController->errorPage();
            }
            break;
        
        case 'Users' :
            $userController->showAllUsers();
        break;
        
        default:
            $pageController->errorPage();
            $page = "Erreur 404";
            break;
    }
}
else
{
    $pageController->index();
    $page = "Accueil";
}

$content = ob_get_clean();

require_once 'views/layout/default.view.php';
