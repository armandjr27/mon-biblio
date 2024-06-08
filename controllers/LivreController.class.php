<?php 
require_once 'Controllers.class.php';
require_once dirname(__DIR__) . '/models/LivreService.class.php';
require_once dirname(__DIR__) . '/models/FileService.class.php';

class LivreController extends Controllers
{
    private $livreService;

    private $fileService;

    public function __construct()
    {
        $this->livreService = new LivreService();
        $this->fileService  = new FileService();
    }

    /**
     * Fonction utile pour la gestion de livre avec PHP pure
     */
    public function render($view, $data = [])
    {
        $livre  = isset($data['livre']) ? $data['livre'] : '';
        $livres = isset($data['livres']) ? $data['livres'] : '';

        require_once dirname(__DIR__) . '/views/livre/' . $view . '.view.php';
    }

    public function showBook()
    {
        $id = $this->verifyInput(isset($_GET['id']) ? $_GET['id'] : 0);

        $this->render('info-livre', ['livre' => $this->livreService->getBookById($id)]);
    }

    public function showAll()
    {
        $this->render('liste-livres', ['livres' => $this->livreService->getAllBooks()]);
    }

    public function showBookForm($id = null)
    {
        if ($id) 
        {
            $id = $this->verifyInput($id);
            $this->render('formulaire-livre', ['livre' => $this->livreService->getBookById($id)]);
        }
        else
        {
            $this->render('formulaire-livre');
        }
    }

    public function saveBook($id = null)
    {
        $titre = $this->verifyInput($_POST['titre']);
        $auteur = $this->verifyInput($_POST['auteur']);
        $date_edition = $this->verifyInput($_POST['date_edition']);
        $file = $this->fileService->uploadFile($_FILES['image']);
        $image = $file['name'];

        if ($id) 
        {
            $id = $this->verifyInput($id);

            $this->livreService->updateBook($titre, $auteur, $date_edition, $id, $image);

            $_SESSION['updated'] = " Les infos sur le livre a bien été mise à jour !";
        }
        else
        {
            $_SESSION['added'] = " Le nouveau livre a bien été ajouter !";

            $this->livreService->insertBook($titre, $auteur, $date_edition, $image);
        }

        header('location: http://localhost/mon-biblio/index.php?p=liste-livres', 302);
    }

    public function dropBook($id)
    {
        $id = $this->verifyInput($id);

        $this->livreService->deleteBook($id);

        $_SESSION['deleted'] = " Le livre a bien été supprimer !";

        header('location: http://localhost/mon-biblio/index.php?p=liste-livres', 302);
    }

    /**
     * Fonction utile pour la gestion de livre avec AJAX
     */

    public function showListeLivre()
    {
        $livres = $this->livreService->getAllBooks();
        require_once dirname(__DIR__) . '/views/livre/liste-livres-by-ajax.view.php';
    }
    
    public function showAllByAjax()
    {
        header('Content-Type: application/json');
        echo json_encode($this->livreService->getAllBooksWithAjax());
    }

    public function showBookByAjax()
    {
        $id = $this->verifyInput($_GET['id']);

        header('Content-Type: application/json');
        echo json_encode($this->livreService->getBookByIdWithAjax($id));
    }

    public function showBookByAjaxWithKey()
    {
        $key = $this->verifyInput($_POST['search']);

        header('Content-Type: application/json');
        echo json_encode($this->livreService->getBookByKey($key));
    }

    public function saveBookByAjax($id = null)
    {
        $msg = '';
        
        $titre        = $this->verifyInput($_POST['titre']);
        $auteur       = $this->verifyInput($_POST['auteur']);
        $date_edition = $this->verifyInput($_POST['date_edition']);
        $file         = $this->fileService->uploadFile(isset($_FILES['image']) ? $_FILES['image'] : "");
        $image        = $file['name'];
        
        if ($id) 
        {
            $id = $this->verifyInput($id);
            $this->livreService->updateBook($titre, $auteur, $date_edition, $id, $image);

            $msg = 'Les infos sur le livre a bien été mise à jour !';
        }
        else
        {
            $this->livreService->insertBook($titre, $auteur, $date_edition, $image);
            $msg = 'Le nouveau livre a bien été ajouter !';
        }

        header('Content-Type: application/json');
        echo json_encode(['message' => $msg]);
    }

    public function dropBookByAjax($id)
    {
        
        $id = $this->verifyInput($id);
        
        $this->livreService->deleteBook($id);
        
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Le livre a bien été supprimer !']);
    }
}