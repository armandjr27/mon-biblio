<?php
require_once 'Services.class.php';
require_once 'Livre.class.php';

class LivreService extends Services
{
    private $table = 'livres';

    public function getBookById($id) 
    {
        $request = $this->getPdo()->prepare($this->select($this->table)->where('id', '=')->query);
        $request->execute([$id]);
        $livreData = $request->fetch(PDO::FETCH_ASSOC);

        if (! $livreData) return;

        $livreObjet = new Livre($livreData['id'], $livreData['titre'], $livreData['auteur'], $livreData['date_edition'], $livreData['image'], $livreData['created_at']);

        return $livreObjet;
    }

    public function getBookByKey($key) 
    {
        $key = "%{$key}%";
        $request = $this->getPdo()->prepare($this->select($this->table)->where('titre', 'LIKE')->query);
        $request->execute([':key' => $key]);
        $livresData = $request->fetchAll(PDO::FETCH_ASSOC);

        return $livresData;
    }

    public function getAllBooks() 
    {
        $request     = $this->getPdo()->query($this->select($this->table)->query);
        $livresData  = $request->fetchAll(PDO::FETCH_ASSOC);
        $livresObjet = [];
    
        foreach ($livresData as $livre)
        {
            $livresObjet[] = new Livre($livre['id'], $livre['titre'], $livre['auteur'], $livre['date_edition'], $livre['image'], $livre['created_at']);
        }
    
        return $livresObjet;
    }
    
    public function insertBook($titre, $auteur, $date_edition, $image = null) 
    {
        $request = $this->getPdo()->prepare($this->insert($this->table, 'titre, auteur, date_edition, image', '?, ?, ?, ?')->query);
        $request->execute([$titre, $auteur, $date_edition, $image]);
    }

    public function updateBook($titre, $auteur, $date_edition, $id, $image = null)
    {
        if ($image)
        {
            $request = $this->getPdo()->prepare($this->update($this->table, 'titre = ?, auteur = ?, date_edition = ?, image = ?, created_at = NOW()')->where('id', '=')->query);
            $request->execute([$titre, $auteur, $date_edition, $image, $id]);
        }
        else
        {
            $request = $this->getPdo()->prepare($this->update($this->table, 'titre = ?, auteur = ?, date_edition = ?, created_at = NOW()')->where('id', '=')->query);
            $request->execute([$titre, $auteur, $date_edition, $id]);
        }
    }

    public function deleteBook($id) 
    {
        $request = $this->getPdo()->prepare($this->delete($this->table)->where('id', '=')->query);
        $request->execute([$id]);
    }
    
    /**
     * Function dispensable pour l'utilisation d'AJAX
     */
    public function getBookByIdWithAjax($id) 
    {
        $request = $this->getPdo()->prepare($this->select($this->table)->where('id', '=')->query);
        $request->execute([$id]);
        $livreData = $request->fetch(PDO::FETCH_ASSOC);
    
        if (! $livreData) return;
    
        return $livreData;
    }
    
    public function getAllBooksWithAjax() 
    {
        $request = $this->getPdo()->query($this->select($this->table)->query);
        $livresData = $request->fetchAll(PDO::FETCH_ASSOC);
    
        return $livresData;
    }
}