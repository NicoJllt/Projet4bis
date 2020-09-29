<?php

namespace App\src\model;

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
     * @var int
     */
    private $IdAuthor;

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
     * @return int
     */
    public function getIdAuthor()
    {
        return $this->IdAuthor;
    }

    /**
     * @param int $IdAuthor
     */
    public function setIdAuthor($IdAuthor)
    {
        $this->IdAuthor = $IdAuthor;
    }
}
