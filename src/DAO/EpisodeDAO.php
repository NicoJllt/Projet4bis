<?php

namespace App\src\DAO;

use App\src\model\Episode;

class EpisodeDAO extends DAO
{
    private function buildObject($row)
    {
        $episode = new Episode();
        $episode->setId($row['id']);
        $episode->setTitle($row['title']);
        $episode->setContent($row['content']);
        return $episode;
    }

    public function getEpisodes()
    {
        $sql = 'SELECT id, title, content FROM episode ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $episodes = [];
        foreach ($result as $row) {
            $episodeId = $row['id'];
            $episodes[$episodeId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $episodes;
    }

    public function getEpisode($episodeId)
    {
        $sql = 'SELECT id, title, content FROM episode WHERE id = ?';
        $result = $this->createQuery($sql, [$episodeId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }
}
