<?php

abstract class Database
{

    // Nos constantes
    const DB_HOST = 'mysql:host=db5000269963.hosting-data.io;dbname=dbs263509;charset=utf8';
    const DB_USER = 'dbu427269';
    const DB_PASS = 'nicoAsc159vhu753kom0@';

    private $connection;

    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if ($this->connection === null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }

    //Méthode de connexion à notre base de données
    public function getConnection()
    {
        //Tentative de connexion à la base de données
        try {
            $this->connection = new PDO(self::DB_HOST, self::DB_PASS, self::DB_USER);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie un message avec le mot-clé return
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch (Exception $errorConnection) {
            die('Erreur de connection :' . $errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}
