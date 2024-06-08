<?php
require_once 'DbConnection.class.php';
abstract class Services extends DbConnection
{
    public $query;
    public $main_table;

    /**
     * Fonction de vérification des entrées de l'utilisateur
     * @param mixed $data entrée à vérifier
     * @return mixed sortie vérifié
     */
    protected function verifyInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    /**
     * Fonction qui renvoi un requête SELECT avec champ spécifique d'une table
     * @param mixed $table table à sélectionner
     * @param mixed $fields champs à afficher
     * @return self SELECT $fields FROM $this->main_table = $table
     */
    public function get($table, $fields) : self
    {
        $this->main_table = $this->verifyInput($table);

        $this->query .= "SELECT {$fields} FROM {$this->main_table}";

        return $this;
    }

    /**
     * Fonction qui joint deux tables à un champ spécifie
     * @param mixed $table table pour la jointure
     * @param mixed $fields champs pour la jointure
     * @return self INNER JOIN $table ON $table.$field = $this->main_table.$field
     */
    public function join($table, $field) : self
    {
        $table = $this->verifyInput($table);
        $field = $this->verifyInput($field);

        $this->query .= " INNER JOIN {$table} ON {$table}.{$field} = {$this->main_table}.{$field}";

        return $this;
    }

    /**
     * Fonction qui renvoi un requête SELECT avec champ tous les champs d'une table
     * @param mixed $table table à sélectionner
     * @return self SELECT * FROM $table
     */
    public function select($table) : self
    {
        $table = $this->verifyInput($table);

        $this->query .= "SELECT * FROM {$table}";

        return $this;
    }

    /**
     * Fonction qui spécifie un condition WHERE d'un requête SQL
     * @param mixed $fields champs à vérifier
     * @param mixed $operand l'opérateur à choisir tel que =, >, <, LIKE ...
     * @return self WHERE $fields $operand ?
     */
    public function where($fields, $operand) : self
    {
        $fields = $this->verifyInput($fields);
        $operand = $this->verifyInput($operand);

        if ($operand === 'LIKE')
        {
            $this->query .= " WHERE {$fields} {$operand} :key ";
        }
        else
        {
            $this->query .= " WHERE {$fields} {$operand} ?";
        }

        return $this;
    }

    /**
     * Fonction permettant de faire une requête d'insertion en SQL
     * @param mixed $table table pour l'insertion
     * @param mixed $fields champs pour l'insertion
     * @param mixed $values valeurs pour l'insertion
     * @return self INSERT INTO $table ($fields) VALUES ($values)
     */
    public function insert($table, $fields, $values) : self
    {
        $table = $this->verifyInput($table);
        $fields = $this->verifyInput($fields);
        $values = $this->verifyInput($values);

        $this->query .= "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

        return $this;
    }

    /**
     * Fonction permettant de faire une requête d'update en SQL
     * Cette fonction est à combiner avec une clause WHERE
     * @param mixed $table table pour l'update
     * @param mixed $fieldsAndValues champs pour l'update
     * @return self UPDATE $table SET $fieldsAndValues
     */
    public function update($table, $fieldsAndValues) : self
    {
        $table = $this->verifyInput($table);
        $fieldsAndValues = $this->verifyInput($fieldsAndValues);

        $this->query .= "UPDATE {$table} SET {$fieldsAndValues}";

        return $this;
    }

    /**
     * Fonction permettant de faire une requête de suppression en SQL
     * Cette fonction est à combiner avec une clause WHERE
     * @param mixed $table table pour la suppression
     * @return self DELETE FROM $table
     */
    public function delete($table) : self
    {
        $table = $this->verifyInput($table);

        $this->query .= "DELETE FROM {$table}";

        return $this;
    }
}