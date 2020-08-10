<?php

namespace App\src\DAO;

class MessageDAO extends DAO
{
    public function getMessagesFromEpisode($episodeId)
    {
        $sql = 'SELECT * FROM messages WHERE messageId = :messageId';
        return $this->createQuery($sql, [$episodeId]);
    }
}