<?php
require_once 'Services.class.php';
require_once 'User.class.php';

class UserService extends Services
{
    private $table = 'users';

    public function getUserByEmail($email)
    {
        $request = $this->getPdo()->prepare($this->select($this->table)->where('email', '=')->query);
        $request->execute([$email]);
        $userData = $request->fetch(PDO::FETCH_ASSOC);

        if (! $userData) return;

        $userObjet = new User($userData['id_user'], $userData['prenom'], $userData['nom'], $userData['email'], $userData['phone'], $userData['genre'], $userData['naissance'], $userData['adresse'], $userData['pass'], $userData['profil'], $userData['type_user'], $userData['adhesion']);

        return $userObjet;
    }

    public function getAllUsers()
    {
        $request    = $this->getPdo()->query($this->select($this->table)->query);
        $usersData  = $request->fetchAll(PDO::FETCH_ASSOC);
        $usersObjet = [];

        foreach ($usersData as $user)
        {
            $usersObjet[] = new User($user['id_user'], $user['prenom'], $user['nom'], $user['email'], $user['phone'], $user['genre'], $user['naissance'], $user['adresse'], $user['pass'],$user['profil'], $user['type_user'], $user['adhesion']);
        }

        return $usersObjet;
    }

    public function insertUser($prenom, $nom, $email, $genre, $naissance, $pass) 
    {
        $request = $this->getPdo()->prepare($this->insert($this->table, 'prenom, nom, email, genre, naissance, pass', '?, ?, ?, ?, ?, ?')->query);
        $request->execute([$prenom, $nom, $email, $genre, $naissance, $pass]);
    }

    public function updateUser($id_user, $prenom, $nom, $email, $phone, $genre, $naissance, $adresse, $profil = null)
    {
        if ($profil)
        {
            $request = $this->getPdo()->prepare($this->update($this->table, 'prenom = ?, nom = ?, email = ?, phone = ?, genre = ?, naissance = ?, adresse = ?, profil = ?, created_at = NOW()')->where('id_user', '=')->query);
            $request->execute([$id_user, $prenom, $nom, $email, $phone, $genre, $naissance, $adresse, $profil]);
        }
        else
        {
            $request = $this->getPdo()->prepare($this->update($this->table, 'prenom = ?, nom = ?, email = ?, phone = ?, genre = ?, naissance = ?, adresse = ?, adhesion = NOW()')->where('id_user', '=')->query);
            $request->execute([$id_user, $prenom, $nom, $email, $phone, $genre, $naissance, $adresse, $profil]);
        }
    }

    public function deleteUser($id_user) 
    {
        $request = $this->getPdo()->prepare($this->delete($this->table)->where('id_user', '=')->query);
        $request->execute([$id_user]);
    }

    public function getAllUsersByAjax()
    {
        $request    = $this->getPdo()->query($this->select($this->table)->query);
        $usersData  = $request->fetchAll(PDO::FETCH_ASSOC);

        return $usersData;
    }
}