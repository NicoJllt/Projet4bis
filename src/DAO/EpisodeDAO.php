<?php

class EpisodeDAO extends DAO
{
    public function getEpisodes($nb, $offset, bool $asc)
    {
        // Requête de récupération des 10 épisodes suivants classées dans l'ordre ascendant
        $sql = 'SELECT * FROM episodes ORDER BY episodeId ' . ($asc ? 'ASC' : 'DESC') . ' LIMIT :offset, :nb';
        return $this->createQuery($sql);
    }

    public function getEpisode($episodeId)
    {
        $sql = 'SELECT * FROM episodes WHERE episodeId = :episodeId';
        return $this->createQuery($sql, [$episodeId]);
    }
}
