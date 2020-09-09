<?php

namespace App\src\DAO;

use App\config\Parameter;
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
        $sql = 'SELECT * FROM episodes, messages
        INNER JOIN users on messages.idUser = users.userId
        WHERE episodeId = ? ORDER BY dateMessage DESC';
        $result = $this->createQuery($sql, [$episodeId]);
        $messages = [];
        foreach ($result as $row) {
            $messageId = $row['messageId'];
            $messages[$messageId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $messages;
    }

    public function addMessage(Parameter $post, $episodeId)
    {
        $sql = 'INSERT INTO messages (username, content, dateMessage, idEpisode) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('username'), $post->get('content'), $episodeId]);
    }
}
