<?php

namespace App\src\DAO;

use App\src\model\Episode;
use App\config\Parameter;

class EpisodeDAO extends DAO
{
    private function buildObject($row)
    {
        $episode = new Episode();
        $episode->setEpisodeId($row['episodeId']);
        $episode->setTitle($row['title']);
        $episode->setContent($row['content']);
        $episode->setDateEpisode($row['dateEpisode']);
        return $episode;
    }

    public function getEpisodes()
    {
        $sql = 'SELECT episodes.episodeId, episodes.title, episodes.content, users.username, episodes.dateMessage FROM episodes INNER JOIN users ON episodes.user_id = users.userId ORDER BY episodes.episodeId DESC';
        $result = $this->createQuery($sql);
        $episodes = [];
        foreach ($result as $row) {
            $episodeId = $row['episodeId'];
            $episodes[$episodeId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $episodes;
    }

    public function getEpisode($episodeId)
    {
        $sql = 'SELECT episodes.episodeId, episodes.title, episodes.content, users.username, episodes.dateMessage FROM episodes INNER JOIN users ON episodes.user_id = users.userId WHERE episodes.episodeId = ?';
        $result = $this->createQuery($sql, [$episodeId]);
        $episode = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($episode);
    }

    public function addEpisode(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO episodes (title, content, dateMessage, idUser) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [
            $post->get('title'),
            $post->get('content'),
            $userId
        ]);
    }

    public function editEpisode(Parameter $post, $episodeId, $userId)
    {
        $sql = 'UPDATE episode SET title=:title, content=:content, idUser=:idUser  WHERE episodeId=:episodeId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'idUser' => $userId,
            'episodeId' => $episodeId
        ]);
    }

    public function deleteEpisode($episodeId)
    {
        $sql = 'DELETE FROM messages WHERE idEpisode = ?';
        $this->createQuery($sql, [$episodeId]);
        $sql = 'DELETE FROM episodes WHERE episodeId = ?';
        $this->createQuery($sql, [$episodeId]);
    }
}
