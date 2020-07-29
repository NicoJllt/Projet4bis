<?php

class Episode
{
    public function getEpisodes($nb, $offset, bool $asc)
    {
        // Requête de récupération des 10 épisodes suivants classées dans l'ordre ascendant
        $db = new Database();
        $connection = $db->getConnection();
        $result = $connection->query('SELECT * FROM episodes ORDER BY episodeId ' . ($asc ? 'ASC' : 'DESC') . ' LIMIT :offset, :nb');
        return $result;
    }

    public function getEpisode($episodeId)
    {
        $db = new Database();
        $connection = $db->getConnection();
        $result = $connection->prepare('SELECT * FROM episodes WHERE episodeId = :episodeId');
        $result->execute([
            $episodeId
        ]);
        return $result;
    }
}
