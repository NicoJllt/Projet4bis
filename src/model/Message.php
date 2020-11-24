<?php

namespace App\src\model;

// Eléments qui se chargent des échanges avec la base de données
class Message
{
    /**
     * @var int
     */
    private $messageId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $dateMessage;

    /**
     * @var bool
     */
    private $flag;

    /**
     * @var int
     */
    private $idEpisode;

    /**
     * @var string
     */
    private $username;

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * @param \DateTime $dateMessage
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;
    }

    /**
     * @return bool
     */
    public function isFlag()
    {
        return $this->flag;
    }

    /**
     * @param bool $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    /**
     * @return int
     */
    public function getIdEpisode()
    {
        return $this->idEpisode;
    }

    /**
     * @param int $idEpisode
     */
    public function setIdEpisode($idEpisode)
    {
        $this->idEpisode = $idEpisode;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}
