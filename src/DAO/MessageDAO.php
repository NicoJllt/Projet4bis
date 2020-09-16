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
        $message->setFlag($row['flag']);
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

    public function addMessage(Parameter $post, $episodeId, $userId)
    {
        $sql = 'INSERT INTO messages (idUser, content, dateMessage, flag, idEpisode) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$userId, $post->get('content'), 0, $episodeId]);
    }

    public function flagComment($messageId)
    {
        $sql = 'UPDATE messages SET flag = ? WHERE messageId = ?';
        $this->createQuery($sql, [1, $messageId]);
    }

    public function deleteMessage($messageId)
    {
        $sql = 'DELETE FROM messages WHERE messageId = ?';
        $this->createQuery($sql, [$messageId]);
    }
}
