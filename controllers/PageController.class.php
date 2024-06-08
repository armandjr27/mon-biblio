<?php 
require_once 'Controllers.class.php';
require_once dirname(__DIR__) . '/models/LivreService.class.php';

class PageController extends Controllers
{
    private $livreService;
    public function __construct() {
        $this->livreService = new LivreService();
    }
    public function render($view, $data = [])
    {
        $livres = isset($data['livres']) ? $data['livres'] : '';
        require_once dirname(__DIR__) . '/views/pages/' . $view . '.view.php';
    }
    public function index()
    {
        $this->render('accueil', ['livres' => $this->livreService->getAllBooks()]);
    }

    public static function errorPage()
    {
        require_once dirname(__DIR__) . '/views/error/e404.view.php';
        header('HTTP/1.0 404 Not Found');
    }
}