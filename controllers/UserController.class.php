<?php
require_once 'Controllers.class.php';
require_once dirname(__DIR__) . '/models/UserService.class.php';
require_once dirname(__DIR__) . '/models/FileService.class.php';

class UserController extends Controllers
{
    private $userService;

    private $fileService;

    public function __construct() {
        $this->userService = new UserService();
        $this->fileService = new FileService();
    }

    public function render($view, $data = [])
    {
        $user  = isset($data['user']) ? $data['user'] : '';
        $users = isset($data['users']) ? $data['users'] : '';

        require_once dirname(__DIR__) . '/views/profil/' . $view . '.view.php';
    }

    public function signUp()
    {
        $this->saveUser();
    }

    public function signIn()
    {
        $this->authentication();
    }

    public function signOut()
    {
        session_destroy();
        header('location:' . Config::site_url('?p=connexion'), 302);
    }

    public function authentication()
    {
        $email = $this->verifyInput($_POST['email']);
        $user = $this->userService->getUserByEmail($email);

        if ($user)
        {
            if (password_verify($_POST['pass'], $user->getPass()))
            {
                $_SESSION = [
                    'e_mail' => $user->getEmail(),
                    'login' => $user->getPrenom(),
                    'type_user' => $user->getTypeUser(),
                    'online' => 1,
                ];

                if($_POST['email_cookie']) 
                {
                    setcookie("email", $user->getEmail(), time() + (86400 * 30), "/");
                }

                header('location:' . Config::site_url(), 302);
            }
            else
            {
                $_SESSION['error_pass'] = " * Le mot de passe est incorrect !";
                header('location:' . Config::site_url('?p=connexion'), 302);
            }
        }
        else
        {
            $_SESSION['error_mail'] = " * L'utilisateur n'existe pas !";
            header('location:' . Config::site_url('?p=connexion'), 302);
        }
    }

    public function showAllUsers()
    {
        header('Content-Type: application/json');
        echo json_encode($this->userService->getAllUsersByAjax());
    }

    public function saveUser($id_user = null)
    {
        $prenom    = $this->verifyInput($_POST['prenom']);
        $nom       = $this->verifyInput($_POST['nom']);
        $email     = $this->verifyInput($_POST['email']);
        $genre     = $this->verifyInput($_POST['genre']);
        $naissance = $this->verifyInput($_POST['naissance']);

        if ($id_user) 
        {
            $id_user = $this->verifyInput($id_user);
            $file    = $this->fileService->uploadFile($_FILES['profil']);
            $profil  = $file['name'];
            $phone   = $this->verifyInput($_POST['phone']);
            $adresse = $this->verifyInput($_POST['adresse']);

            $this->userService->updateUser($id_user, $prenom, $nom, $email, $phone, $genre, $naissance, $adresse, $profil);

            $_SESSION['updated'] = " Les infos sur l'utilisateur a bien été mise à jour !";
        }
        else
        {
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            
            $this->userService->insertUser($prenom, $nom, $email, $genre, $naissance, $pass);

            $_SESSION['added'] = "Inscription avec succès! <br/>Vous pouvez maintenant vous connecter !";
            $_SESSION['login'] = $email;
        }
    }

    public function dropUser($id_user)
    {
        $id_user = $this->verifyInput($id_user);

        $this->userService->deleteUser($id_user);

        $_SESSION['deleted'] = " L'utilisateur a bien été supprimer !";
    }
}