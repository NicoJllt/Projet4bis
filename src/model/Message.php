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
    private $username;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $dateMessage;

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $id
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
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
}