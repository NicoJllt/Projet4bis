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
        $message->setIdEpisode($row['idEpisode']);
        return $message;
    }

    public function getMessagesFromEpisode($episodeId)
    {
        $sql = 'SELECT * FROM episode, message
        INNER JOIN user on message.idAuthor = user.userId
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

    public function getMessage($messageId)
    {
        $sql = 'SELECT message.messageId, message.content, user.username, message.idEpisode, message.dateMessage, message.flag FROM message 
        INNER JOIN user ON message.idAuthor = user.userId
        INNER JOIN episode ON episode.episodeId = message.idEpisode
        WHERE message.messageId = ?';
        $result = $this->createQuery($sql, [$messageId]);
        $message = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($message);
    }

    public function addMessage(Parameter $post, $idEpisode, $idAuthor)
    {
        $sql = 'INSERT INTO message (idAuthor, content, dateMessage, flag, idEpisode) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$idAuthor, $post->get('content'), 0, $idEpisode]);
    }

    public function editMessage(Parameter $post, $messageId, $idEpisode, $idAuthor)
    {
        $sql = 'UPDATE message SET content=:content, idEpisode=:idEpisode, idAuthor=:idAuthor WHERE messageId=:messageId';
        $this->createQuery($sql, [
            'content' => $post->get('content'),
            'idEpisode' => $idEpisode,
            'idAuthor' => $idAuthor,
            'messageId' => $messageId
        ]);
    }

    public function flagComment($messageId)
    {
        $sql = 'UPDATE message SET flag = ? WHERE messageId = ?';
        $this->createQuery($sql, [1, $messageId]);
    }

    public function unflagComment($messageId)
    {
        $sql = 'UPDATE message SET flag = ? WHERE messageId = ?';
        $this->createQuery($sql, [0, $messageId]);
    }

    public function deleteMessage($messageId)
    {
        $sql = 'DELETE FROM message WHERE messageId = ?';
        $this->createQuery($sql, [$messageId]);
    }

    public function getFlagComments()
    {
        $sql = 'SELECT message.messageId, user.username, message.content, message.idEpisode, message.dateMessage, message.flag FROM message 
        INNER JOIN user ON message.idAuthor = user.userId
        INNER JOIN episode ON episode.episodeId = message.idEpisode
        WHERE flag = ? ORDER BY dateMessage DESC';
        $result = $this->createQuery($sql, [1]);
        $messages = [];
        foreach ($result as $row) {
            $messageId = $row['messageId'];
            $messages[$messageId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $messages;
    }
}
