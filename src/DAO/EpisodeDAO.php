<?php

namespace App\src\DAO;

use App\src\model\Episode;
use App\config\Parameter;

class EpisodeDAO extends DAO
{
    // Création d'un objet modèle sur la base des données reçues de la BDD
    // On aurait pu utiliser un constructeur avec paramètre dans le modèle
    private function buildObject($row)
    {
        $episode = new Episode();
        $episode->setEpisodeId($row['episodeId']);
        $episode->setTitle($row['title']);
        $episode->setContent($row['content']);
        $episode->setDateEpisode($row['dateEpisode']);
        return $episode;
    }
    // Récupération des épisodes paginés
    public function getEpisodes($page, $nb, bool $asc)
    {
        $sql = 'SELECT episode.episodeId, episode.title, episode.content, user.username, episode.dateEpisode
        FROM episode INNER JOIN user ON episode.idAuthor = user.userId
        ORDER BY episode.episodeId ' . ($asc ? 'ASC' : 'DESC') . ' LIMIT ' . ($page - 1) * $nb . ', ' . $nb;
        $result = $this->createQuery($sql);
        $episodes = [];
        foreach ($result as $row) {
            $episodeId = $row['episodeId'];
            $episodes[$episodeId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $episodes;
    }

    // Récupération d'un épisode en fonction de son ID
    public function getEpisode($episodeId)
    {
        $sql = 'SELECT episode.episodeId, episode.title, episode.content, user.username, episode.dateEpisode FROM episode INNER JOIN user ON episode.idAuthor = user.userId WHERE episode.episodeId = ?';
        $result = $this->createQuery($sql, [$episodeId]);
        $episode = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($episode);
    }

    public function addEpisode(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO episode (title, content, dateEpisode, idAuthor) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [
            $post->get('title'),
            $post->get('content'),
            $userId
        ]);
    }

    public function editEpisode(Parameter $post, $episodeId, $idAuthor)
    {
        $sql = 'UPDATE episode SET title=:title, content=:content, idAuthor=:idAuthor  WHERE episodeId=:episodeId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'idAuthor' => $idAuthor,
            'episodeId' => $episodeId
        ]);
    }

    public function deleteEpisode($episodeId)
    {
        $sql = 'DELETE FROM message WHERE idEpisode = ?';
        $this->createQuery($sql, [$episodeId]);
        $sql = 'DELETE FROM episode WHERE episodeId = ?';
        $this->createQuery($sql, [$episodeId]);
    }
    
    // Retourne le nombre d'épisodes
    public function count()
    {
        $sql = 'SELECT COUNT(*) AS count FROM episode';
        $result = $this->createQuery($sql);
        $count = $result->fetch();
        $result->closeCursor();
        return $count['count'];
    }
}
