<?php

class Message extends Database
{
    public function getMessagesFromEpisode($episodeId)
    {
        $sql = 'SELECT * FROM messages WHERE messageId = :messageId';
        return $this->createQuery($sql, [$episodeId]);
    }
}