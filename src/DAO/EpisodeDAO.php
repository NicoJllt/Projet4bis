<?php

namespace App\src\DAO;

use App\src\model\Episode;

class EpisodeDAO extends DAO
{
    private function buildObject($row)
    {
        $episode = new Episode();
        $episode->setEpisodeId($row['episodeId']);
        $episode->setTitle($row['title']);
        $episode->setContent($row['content']);
        return $episode;
    }

    public function getEpisodes()
    {
        $sql = 'SELECT episodeId, title, content FROM episodes ORDER BY episodeId DESC';
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
        $sql = 'SELECT episodeId, title, content FROM episodes WHERE episodeId = ?';
        $result = $this->createQuery($sql, [$episodeId]);
        $episode = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($episode);
    }

    public function addEpisode($episode)
    {
        //Permet de récupérer les variables $title, $content et $author
        extract($episode);
        $sql = 'INSERT INTO episodes (title, content, dateMessage) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$title, $content]);
    }
}
