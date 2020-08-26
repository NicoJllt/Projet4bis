<?php

namespace App\src\DAO;

use App\src\model\Message;

class MessageDAO extends DAO
{
    private function buildObject($row)
    {
        $message = new Message();
        $message->setMessageId($row['messageId']);
        $message->setUsername($row['username']);
        $message->setContent($row['content']);
        $message->setDateMessage($row['dateMessage']);
        return $message;
    }

    public function getMessagesFromEpisode($episodeId)
    {
        $sql = 'SELECT messageId, username, content, dateMessage FROM message WHERE episode_id = ? ORDER BY dateMessage DESC';
        $result = $this->createQuery($sql, [$episodeId]);
        $messages = [];
        foreach ($result as $row) {
            $messageId = $row['messageId'];
            $messages[$messageId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $messages;
    }
}